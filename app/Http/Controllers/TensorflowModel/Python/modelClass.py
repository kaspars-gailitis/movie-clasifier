from __future__ import absolute_import, division, print_function

import tensorflow as tf
from tensorflow import keras

import numpy as np
import matplotlib as mpl
mpl.use('TkAgg')

class kerasMovieModel:
    NUM_WORDS = 10000

    def __init__(self, imdb=True, tain_data=None, train_labels=None, test_data=None, test_labels=None, model=None, loadData=True):
        if imdb:
            self.loadKeras()
            self._alterBulkData()
        elif loadData:
            self.train_data = tain_data
            self.train_labels = train_labels
            self.test_data = test_data
            self.test_labels = test_labels
            self._alterBulkData()

        self.model = self._loadModel()
        self.word_index = self._loadWordIndex()
        self.reverse_word_index = self._loadReverseWordIndex()

    def trainModel(self):
        self.model = keras.models.Sequential([
            keras.layers.Dense(16, kernel_regularizer=keras.regularizers.l2(0.001), activation='relu', input_shape=(self.NUM_WORDS,)),
            keras.layers.Dropout(0.5),
            keras.layers.Dense(16,kernel_regularizer=keras.regularizers.l2(0.001), activation='relu'),
            keras.layers.Dropout(0.5),
            keras.layers.Dense(1, activation='sigmoid')
        ])

        self.model.compile(optimizer='adam',
                        loss='binary_crossentropy',
                        metrics=['accuracy','binary_crossentropy'])

        self.model_history = self.model.fit(self.train_data, self.train_labels,
                                        epochs=40,
                                        batch_size=512,
                                        validation_data=(self.test_data, self.test_labels),
                                        verbose=2)
        self.model.save("app/Http/Controllers/TensorflowModel/Python/tf_keras_model_2.h5")
    def _multiHotSequences(self, sequences, dimension):
        # Create an all-zero matrix of shape (len(sequences), dimension)
        results = np.zeros((len(sequences), dimension))
        for i, word_indices in enumerate(sequences):
            results[i, word_indices] = 1.0  # set specific indices of results[i] to 1s
        return results

    def _alterBulkData(self):
        self.train_data = self._alterData(self.train_data)
        self.test_data = self._alterData(self.test_data)
    
    def _alterData(self, text):
        return self._multiHotSequences(text, dimension=self.NUM_WORDS)

    def loadKeras(self):
        imdb = keras.datasets.imdb
        (self.train_data, self.train_labels), (self.test_data, self.test_labels) = imdb.load_data(num_words=self.NUM_WORDS)
    
    def _loadReverseWordIndex(self):
        reverse_word_index = dict([(value, key) for (key, value) in self.word_index.items()])
        return reverse_word_index

    def _loadWordIndex(self):
        word_index = keras.datasets.imdb.get_word_index()
        word_index = {k:(v+3) for k,v in word_index.items()} 
        word_index["<PAD>"] = 0
        word_index["<START>"] = 1
        word_index["<UNK>"] = 2  # unknown
        word_index["<UNUSED>"] = 3
        return word_index

    def preprocessText(self, text):
        text = keras.preprocessing.text.text_to_word_sequence(text)
        processed=[]
        for word in text:
            processed.append(self.word_index[word])
        processed = np.array([processed])
        processed=self._alterData(processed)
        return processed

    def decodeReview(self, text):
        return ' '.join([self.reverse_word_index.get(i, '?') for i in text])

    def _loadModel(self):
        return keras.models.load_model('app/Http/Controllers/TensorflowModel/Python/tf_keras_model_2.h5')
    
    def predictValue(self, text):
       return self.model.predict(text)