import unittest
import tensorflow as tf
import numpy as np
from modelClass import kerasMovieModel

class TestMachineLearningMethods(unittest.TestCase):
    
    def test_train_model(self, newModelInstance = kerasMovieModel(imdb=True)):
        self.assertIsNone(newModelInstance.trainModel())

    def test_load_keras(self, newModelInstance = kerasMovieModel(imdb=False, loadData=False)):
        self.assertIsNone(newModelInstance.loadKeras())

    def test_preprocess_text(self, newModelInstance = kerasMovieModel(imdb=False, loadData=False)):
        self.assertIsInstance(newModelInstance.preprocessText('review test'), np.ndarray)

    def test_decode_review(self, newModelInstance = kerasMovieModel(imdb=False, loadData=False)):
        self.assertIsInstance(newModelInstance.decodeReview(np.array([1,0,0,1,1])), str)

    def test_predict_value_direct(self, newModelInstance = kerasMovieModel(imdb=False, loadData=False)):
        self.assertIsInstance(newModelInstance.predictValue(text = np.zeros((10000,10000), dtype=int)), np.ndarray)

    def test_predict_value_altered(self, newModelInstance = kerasMovieModel(imdb=False, loadData=False)):
        text = newModelInstance.preprocessText('review test')
        self.assertIsInstance(newModelInstance.predictValue(text), np.ndarray)

if __name__ == '__main__':
    unittest.main()