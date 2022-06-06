from functools import reduce


list1 = input()
list1 = list1.split(",")
for i in range(len(list1)):
    list1[i] = int(list1[i])

def anzahl_gerade (xs: list):
    print(reduce(lambda x1: x1+1, list(filter(lambda x: x/2, xs)), 0))

anzahl_gerade(list1)

#def mein_filter (xs: list, fuc: function) -> list:
    #return list(reduce(  ))