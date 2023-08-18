
	   
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
VALUES (NULL,'Sebuah dadu lalu dilempar satu kali, berapa peluang munculnya mata dadu 5?','single','','a.1/2','b.1/4','c.1/6','d.1/8','c'),
       (NULL,'Rudi memiliki dua buah koin 1000 rupiah, lalu melempar kedua koin tersebut bersamaan. Berapa peluang muncul gambar pada kedua koin?','single','','a.1/2','b.1/4','c.1/16','d.1/8','b'),
       (NULL,'Dua buah dadu dilempar secara bersamaan. Berapakah peluang kejadian muncul jumlah kedua mata dadu = 6?','single','','a.5/36','b.1/9','c.1/6','d.7/36','a'),
	   (NULL,'Perhatikan beberapa kejadian/peristiwa berikut.
1. Munculnya mata dadu dari hasil pelemparan sebuah dadu.
2. Kelahiran seorang bayi laki-laki.
3. Munculnya api di kedalaman lautan.
4. Seekor kucing dapat berbahasa Indonesia.
Dari kejadian/peristiwa di atas, manakah yang memiliki peluang kejadian 
?','multiple','','a. 1,3','b. 2,3','c. 1,2','d. 3,4','ad'),
	   (NULL,'Seni menulis huruf Arab yang indah disebut....','single','','a. kaligrafi','b. kartografi','c. karikatur','d.Biografi','a'),
	   (NULL,'Penyebaran Islam di daerah pesisir pertama kali melalui....','single','','a. perdagangan','b. politik','c. pendidikan','d. perkawinan','a'),
	   (NULL,'Kitab Nitisruti dan Nitisastra adalah karya....','single','','a. Ronggowarsito','b. Hamzah Fansuri','c. Sultan Agung','d. Hamengkubuwono','c'),
	   (NULL,'Istilah Bahasa Arab yang terpengaruh dari negara Turki adalah ....','single','','a. Jeer','b. pees','c. jabar','d. Hijr','abc'),
	   (NULL,'Peristiwa menghirup oksigen dan mengeluarkan karbondioksida beserta uap air disebut …','single','','a. Respirasi','b. Inspirasi','c. Transpirasi','d. Ventilasi','a'),
	   (NULL,'Proses respirasi yang terjadi di dalam sel disebut …','single','','a. Respirasi internal','b. Respirasi','c. Respirasi Seluler','d. Respirasi eksternal','c'),
	   (NULL,'Proses pertukaran gas-gas antara alveolus paru-paru dengan darah di dalam pembuluh kapiler paru-paru disebut …','single','','a. Respirasi eksternal','b. Respirasi internal','c. Ventilasi paru-paru','d. Ventilasi jantung','a'),
	   (NULL,'Perhatikan pernyataan di bawah ini:
1) Memakai masker
2) Merokok
3) Rajin berolahraga
4) Makan makanan bergizi
Upaya menjaga sistem pernafasan kita antara lain ditunjukkan nomor...','multiple','','a. 1','b. 2','c. 3','d. 4','acd'),
	   (NULL,'. Peter : Excuse me; are you here for first day at this English course?
Ruth : Yes, I am.
Peter : Can I take your name, please?
Ruth : ______
Peter : Good morning Ruth, my name’s Peter Smith and welcome to Ruang English Course.
','single','','a. My name is Ruth Goldilocks.','b. Your name is Ruth Goldilocks.','c. Her name is Ruth Goldilocks.','d. His name is Ruth Goldilocks.','a'),
	   (NULL,'Sally : Hi Andrew, how are you?
Andrew : Fine, thanks. And yourself?
Sally : I’m very well, thanks. I appreciate you coming to the first meeting of English  Club today. Andrew, let me introduce you to Claire. She’s our chairperson of this amazing club.
The bold sentence above show us the expression of…
','single','','a. introducing yourself','b. introducing themselves','c. introducing someone','d. introducing ourself','c'),
	   (NULL,'Victor : Hello. My name is Victor. What’s your name?
Janet : Janet.
Victor : ______, Janet?
Janet : I’m from Surabaya. Where are you from?
Victor : I’m from Malang.','single','','a. where do you live','b. where do you come from','c. what is your name','d. How old are you','b');


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