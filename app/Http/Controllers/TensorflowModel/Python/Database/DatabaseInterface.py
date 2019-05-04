from orator import DatabaseManager, Model

class Movie(Model):
    pass

class Review(Model):
    pass

class MachineLearningData(Model):
    pass
class UserAlgorithmPerformanceRating(Model):
    pass
class DatabaseInstance:
    def __init__(self):
        self._connect() 
    def _connect(self):
        config = {
            'mysql': {
                'driver': 'mysql',
                'host': '127.0.0.1',
                'database': 'mlalgorith',
                'user': 'root',
                'password': 'root',
                'prefix': ''
            }
        }
        db = DatabaseManager(config)
        Model.set_connection_resolver(db)

    def getReviewById(self, id):
        return Review.find(id)

    def getMovieById(self, id):
        return Movie.find(id)

    def MachineLearningData(self, id):
        return MachineLearningData.find(id)
    
    def UserAlgorithmPerformanceRating(self, id):
        return UserAlgorithmPerformanceRating.find(id)

    def updateDatabase(self, rawReviewRating, reviewId):
        review = self.getReviewById(reviewId)
        review.raw_rating = rawReviewRating
        if (rawReviewRating > 0.65):
            review.final_rating = 1
        elif (rawReviewRating < 0.45):
            review.final_rating = 0
        else:
            review.final_rating = -1
        review.save()