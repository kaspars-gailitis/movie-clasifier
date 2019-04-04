from modelClass import kerasMovieModel as itm

newItm = itm(imdb=False, loadData=False)


test_raw = "loved it, an amazing movie, would recommend to others"
test_text = newItm.preprocessText(test_raw)
print(test_raw," Prediction: ",newItm.predictValue(test_text))
test_raw = "hated it, worst movie ever"
test_text = newItm.preprocessText(test_raw)
print(test_raw," Prediction: ",newItm.predictValue(test_text))