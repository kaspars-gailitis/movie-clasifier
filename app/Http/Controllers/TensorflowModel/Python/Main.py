import sys
from MachineLearning.modelClass import kerasMovieModel
from Database.DatabaseInterface import DatabaseInstance

def rateReview(reviewId):
    db = DatabaseInstance()
    newModelInstance = kerasMovieModel(imdb=False, loadData=False)

    reviewText = db.getReviewById(reviewId).review_text
    reviewText = newModelInstance.preprocessText(reviewText)

    #Returns numpy.float32
    rawRating = newModelInstance.predictValue(reviewText)[0][0]
    rawRating = float(rawRating)

    db.updateDatabase(rawRating, reviewId)

reviewId = sys.argv[1]
rateReview(reviewId)