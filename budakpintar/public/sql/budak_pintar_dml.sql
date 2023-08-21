
	   
INSERT INTO `genre`
VALUES (NULL,'Matematika'),
       (NULL,'Sosial'),
       (NULL,'Sains'),
	   (NULL,'Bahasa');
	   
INSERT INTO `kuis`
VALUES (NULL,1,'Peluang','Mencari tau seberapa besar peluangku tuk mendapatkan hatimu'),
       (NULL,2,'Sejarah kelas X','Kumpulan soal-soal mata pelajaran sejarah kelas X untuk persiapan ujian sekolah'),
       (NULL,3,'Sistem Pernapasan Manusia','Belajar cara manusia bernapas'),
	   (NULL,4,'Self Introduction','GAK BISA BAHASA ENGGRESSSSS...........');
	   
INSERT INTO `kumpulan_soal`
VALUES (NULL,'Sebuah dadu lalu dilempar satu kali, berapa peluang munculnya mata dadu 5?','single','','1/2','1/4','1/6','1/8','c'),
       (NULL,'Rudi memiliki dua buah koin 1000 rupiah, lalu melempar kedua koin tersebut bersamaan. Berapa peluang muncul gambar pada kedua koin?','single','','1/2','1/4','1/16','1/8','b'),
       (NULL,'Dua buah dadu dilempar secara bersamaan. Berapakah peluang kejadian muncul jumlah kedua mata dadu = 6?','single','','5/36','1/9','1/6','7/36','a'),
	   (NULL,'Perhatikan beberapa kejadian/peristiwa berikut.
1. Munculnya mata dadu dari hasil pelemparan sebuah dadu.
2. Kelahiran seorang bayi laki-laki.
3. Munculnya api di kedalaman lautan.
4. Seekor kucing dapat berbahasa Indonesi
Dari kejadian/peristiwa di atas, manakah yang memiliki peluang kejadian 
?','multiple','','1,3','2,3','1,2','3,4','ad'),
	   (NULL,'Seni menulis huruf Arab yang indah disebut....','single','','kaligrafi','kartografi','karikatur','Biografi','a'),
	   (NULL,'Penyebaran Islam di daerah pesisir pertama kali melalui....','single','','perdagangan','politik','pendidikan','perkawinan','a'),
	   (NULL,'Kitab Nitisruti dan Nitisastra adalah kary...','single','','Ronggowarsito','Hamzah Fansuri','Sultan Agung','Hamengkubuwono','c'),
	   (NULL,'Istilah Bahasa Arab yang terpengaruh dari negara Turki adalah ....','single','','Jeer','pees','jabar','Hijr','abc'),
	   (NULL,'Peristiwa menghirup oksigen dan mengeluarkan karbondioksida beserta uap air disebut …','single','','Respirasi','Inspirasi','Transpirasi','Ventilasi','a'),
	   (NULL,'Proses respirasi yang terjadi di dalam sel disebut …','single','','Respirasi internal','Respirasi','Respirasi Seluler','Respirasi eksternal','c'),
	   (NULL,'Proses pertukaran gas-gas antara alveolus paru-paru dengan darah di dalam pembuluh kapiler paru-paru disebut …','single','','Respirasi eksternal','Respirasi internal','Ventilasi paru-paru','Ventilasi jantung','a'),
	   (NULL,'Perhatikan pernyataan di bawah ini:
1) Memakai masker
2) Merokok
3) Rajin berolahraga
4) Makan makanan bergizi
Upaya menjaga sistem pernafasan kita antara lain ditunjukkan nomor...','multiple','','1','2','3','4','acd'),
	   (NULL,'. Peter : Excuse me; are you here for first day at this English course?
Ruth : Yes, I am.
Peter : Can I take your name, please?
Ruth : ______
Peter : Good morning Ruth, my name’s Peter Smith and welcome to Ruang English Course.
','single','','My name is Ruth Goldilocks.','Your name is Ruth Goldilocks.','Her name is Ruth Goldilocks.','His name is Ruth Goldilocks.','a'),
	   (NULL,'Sally : Hi Andrew, how are you?
Andrew : Fine, thanks. And yourself?
Sally : I’m very well, thanks. I appreciate you coming to the first meeting of English  Club today. Andrew, let me introduce you to Claire. She’s our chairperson of this amazing clu
The bold sentence above show us the expression of…
','single','','introducing yourself','introducing themselves','introducing someone','introducing ourself','c'),
	   (NULL,'Victor : Hello. My name is Victor. What’s your name?
Janet : Janet.
Victor : ______, Janet?
Janet : I’m from SurabayWhere are you from?
Victor : I’m from Malang.','single','','where do you live','where do you come from','what is your name','How old are you','b');


INSERT INTO `detail_kuis`
VALUES (1,1),(2,1),(3,1),(4,1),
	   (5,2),
	   (6,2),
	   (7,2),
	   (8,2),
	   (9,3),
	   (10,3),
	   (11,3),
	   (12,3),
	   (13,4),
	   (14,4),
	   (15,4);