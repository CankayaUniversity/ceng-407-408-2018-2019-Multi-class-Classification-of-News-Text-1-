#!D:\Python\python.exe

import cgi
import os

import sys

#print ("Content-Type: text/html \n\n")


#print (len(sys.argv))
model_name = sys.argv[1]
vec_num = sys.argv[2]
vec_num = int(vec_num)  #int the string

test_rat = sys.argv[3]
test_rat = float(test_rat)
ep = sys.argv[4]
ep= int(ep)
filePath = sys.argv[5]

# many labels 4 is a must
labels1 = sys.argv[6]
labels2 = sys.argv[7]
labels3 = sys.argv[8]
print (labels3)
labels4 = sys.argv[9]
labelsa = [  labels1, labels2, labels3, labels4 ]

#print (labels)
dirName = 'D:\\xampp\\htdocs\\mtlbl\\webpage\\admin\\models\\' + model_name

#os.mkdir(dirName)

model_path = dirName + '\\' + model_name
scaler_path = dirName + '\\scaler_' + model_name
keras_path =  dirName + '\\keras_'+  model_name + '.h5'
print (model_path)
print (keras_path)
print (scaler_path)

#from magpie import Magpie

#magpie = Magpie()

#magpie = Magpie(
 #   keras_model=keras_path,
  #  word2vec_model=model_path,
   # scaler= scaler_path,
    #labels = labelsa
#)
#filePath = 'D:\\xampp\\htdocs\\mtlbl\\webpage\\admin\\classify' + model_name + '\\' + '.txt'

#magpie.predict_from_file(filePath) #test

#magpie.predict_from_text('Manchester United vs Chelsea')
