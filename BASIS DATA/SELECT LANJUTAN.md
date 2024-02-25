



# SELECT LANJUTAN


## AND


### STRUKTUR



### CONTOH


```MySQL

SELECT warna,pemilik FROM mobil WHERE warna="HITAM" AND pemilik="FAREL";

```



### HASIL


>![Foto_hasil](Asetss/IMG-28.jpg)





### ANALISIS







### KESIMPULAN







## OR


### STRUKTUR



### CONTOH



```MySQL

SELECT warna,pemilik FROM mobil WHERE warna="Hitam" OR pemilik="ASEP";

```




### HASIL



>![Foto_hasil](Asetss/IMG-29.jpg)




### ANALISIS






### KESIMPULAN








## BETWEEN


### STRUKTUR





### CONTOH



```MySQL

SELECT * FROM mobil WHERE harga_rental BETWEEN 100000 AND 150000;

```



### HASIL



>![Foto_hasil](Asetss/IMG-30.jpg)




### ANALISIS






### KESIMPULAN







## NOT BETWEEN


### STRUKTUR





### CONTOH



```MySQL

SELECT * FROM mobil WHERE harga_rental NOT BETWEEN 100000 AND 150000;

```




### HASIL



>![Foto_hasil](Asetss/IMG-33.jpg)






### ANALISIS







### KESIMPULAN









## <=



### STRUKTUR


### CONTOH



```MySQL

SELECT * FROM mobil WHERE harga_rental <= 100000;

```



### HASIL



>![Foto_hasil](Asetss/IMG-35.jpg)




### ANALISIS







### KESIMPULAN










## >=



### STRUKTUR


### CONTOH



```MySQL

SELECT * FROM mobil WHERE harga_rental >= 100000;

```




### HASIL


>![Foto_hasil](Asetss/IMG-31.jpg)




### ANALISIS








### KESIMPULAN





## <> atau !=



### STRUKTUR


### CONTOH


<>

```MySQL

SELECT * FROM mobil WHERE harga_rental <> 100000;

```


---


!=

```MySQL

SELECT * FROM mobil WHERE harga_rental != 100000;

```





### HASIL



<>

>![Foto_hasil](Asetss/IMG-32.jpg)


!=


>![Foto_hasil](Asetss/IMG-34.jpg)





### ANALISIS






### KESIMPULAN






## TANTANGAN



### STRUKTUR







### CONTOH


```MySQL

SELECT pemilik FROM mobil WHERE id_mobil=1;

```

### HASIL


>![Foto_hasil](Asetss/IMG-27.jpg)





### ANALISIS





### KESIMPULAN









