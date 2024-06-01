# 5
## Kode program 

```sql

IN(SELECT EmpID FROM orders GROUP BY EmpID HAVING COUNT (EmpID) = 1);
```

## Hasil 

![praktikum](lima5.jpg)


## Analisis

SELECT = untuk memilih kolom mana saja yang ingin ditampilkan. *= tanda untuk memilih semua kolom Yang ada dalam tabel yang dipilih.

From Employees = merupakan nama dari tabel rand dipilih untuk ditampilkan koromnya. - WHERE = kondisi Yang harus dipenuhi oleh suatu data asar bisa ditampilkan. - (EMPID IN (SELECT EMPID FROM Orders GROUP BY EMPID HAVING COUNT (EMPID) = 1))

> Kondisi dari WHERE Yang harus dipenuhi. GROUP BY EMPID untuk mengelompokkan Folom EMPID dengan datanya Yang Sama. COUNT (untuk menghitung berapa banyak data Buda Kolom Yang dipilih).

Hasilnya kita ingin mencari Pegawai Yang telah melakukan transaksi sebanyak 1

Satu kali Pada tabel orders. (seperti sebeium-sebelumnya) dalam tabel orders terdapat 3 EmPID Yond telah melakukan transaksi Yaitu 1,3 dan 4. Diantara ketida pegawai ini kita akan mencari terlebih dahulu berala buntat transaksi Yang dilakukan masing-masing lesawai tersebut dengan mρηθθυπακοη COUNT untuk menghitun berapa banyak data Yang sama (beruland). dendan kondisi sama dengan satu. Berarti kita hanya menampilkan EMPED Yory hanya tamil sekali. Dengan mengeremparkan datanya, lalu menghitung berad kali datanya berulang kita dapat mendapatkan Emp TD 1 dan 3 tandhana tampil sekali Yand berarti telah melakukan transaksi sebartak satu ali



# Lanjutan 5
## Kode Program

```sql
(SELECT MAX (EmpID) FROM employees WHERE city = "seattle");

```
## Hasil

![praktikum](lnjtan.jpg)

## Analisis 

kenapa tidak ada yang tampil ? (Empty set)

100000

= Ini dikarenakan subquerynya. Disitu kita mencari EmPID tertinggi Yang katanya "Seattie". EmPID Yang memiliki kota seattle adalah 1 dan 8, diantara kedua Hu Yang tertingdi atau max adalah EmPID 8. (lebih besar dati 1) - ketika kita ke tabel orders hanya terdapat 3 Jenis EmPID Yaitu 1,3 dan 4. Jika kita ingin mexami orderID dari tabel orders dengan kondisi Empil niya sama dengan CEMPID tertiasli dari kota Seattle Yaitu EmPID 8). Tidak ada yang akan tampil karena di tabel orders tidak ada EMPTD & (hanya 1,3 dan 4).



# 1 
## Kode Program 

```sql
Select * from orders; 
```

## Hasil 

![praktikum](satu1.jpg)


## Analisis

Langkah Pertama = kita lihat dan tampilkan dulu isi dari semua tabel order untuk mengetahui orderID Yang ingin kita tampilkan. Di barisan data ke-3 Yaitu orderID 10258 Yang mempunyai EmPID 1.


