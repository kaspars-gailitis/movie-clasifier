from modelClass import kerasMovieModel as movieModel

modelInstance = movieModel(imdb=True)
modelInstance.trainModel()