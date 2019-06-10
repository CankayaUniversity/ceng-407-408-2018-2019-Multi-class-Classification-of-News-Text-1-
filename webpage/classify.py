#!D:\Python\python.exe

import cgi
import os

import sys

#print ("Content-Type: text/html \n\n")


#print (len(sys.argv))
model_name = sys.argv[1]
#print(model_name)
vec_num = sys.argv[2]
vec_num = int(vec_num)  #int the string

test_rat = sys.argv[3]
test_rat = float(test_rat)
ep = sys.argv[4]
ep= int(ep)
filePath = sys.argv[5]
val = sys.argv[6]

# many labels 4 is a must
labels1 = sys.argv[7]
labels2 = sys.argv[8]
labels3 = sys.argv[9]
#print (labels3)
labels4 = sys.argv[10]
labelsa = [  labels1, labels2, labels3, labels4 ]

#print (labels)
dirName = 'D:\\xampp\\htdocs\\mtlbl\\webpage\\models\\' + model_name

#os.mkdir(dirName)

model_path = dirName + '\\' + model_name
scaler_path = dirName + '\\scaler_' + model_name
keras_path =  dirName + '\\keras_'+  model_name + '.h5'

#print (model_path)
#print (keras_path)
#print (scaler_path)

from magpie import Magpie

magpie = Magpie()

magpie = Magpie(
   keras_model=keras_path,
  word2vec_model=model_path,
 scaler= scaler_path,
labels = labelsa
)
#filePath = 'D:\\xampp\\htdocs\\mtlbl\\webpage\\admin\\classify' + model_name + '\\' + '.txt'
path= 'D:\\xampp\\htdocs\\mtlbl\\webpage\\admin\\classify\\' + model_name + '\\' + val
#print(path)
print (magpie.predict_from_file(path)) #test

#magpie.predict_from_text('Manchester United vs Chelsea')

