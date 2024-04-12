CREATE DATABASE IF NOT EXISTS`mi`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE mi;

/*Felhasználók*/
CREATE TABLE IF NOT EXISTS users (
  Id int(10) unsigned NOT NULL auto_increment,
  FirstName varchar(32) NOT NULL ,
  LastName varchar(32) NOT NULL ,
  UserName varchar(32) NOT NULL ,
  Passw varchar(256) NOT NULL ,
  PRIMARY KEY  (Id)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE UNIQUE INDEX IF NOT Exists uniqueUserName on users (UserName);

/*utazások*/
CREATE TABLE IF NOT EXISTS trips (
	TripId INT NOT NULL AUTO_INCREMENT,
    Country varchar(128),
    Hotel varchar(128),
	City varchar(64),
    Address varchar(128),
    Content text,
    Map varchar(512),
    Price INT,
	PRIMARY KEY (TripId)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

/*képek*/
CREATE TABLE IF NOT EXISTS images (
	ImageId INT NOT NULL AUTO_INCREMENT,
    TripId INT NOT NULL,
    ImageName varchar(64),
    Path varchar(256),
	PRIMARY KEY (ImageId),
    FOREIGN KEY (TripId) REFERENCES trips(TripId)
)
ENGINE = MYISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;

/*Utazások*/
Insert into trips (Country,Hotel,City,Address,Content,Map,Price)
select 
	'Ciprus',
    'La C Mer',
    'Larnaka',
    'WJ6P+PXQ',
    '<div>
        <h1>Vár a mesés Ciprus!</h1>
        <p>Csatlakozz hozzánk egy különleges utazásra a gyönyörű Ciprus szigetére, ahol a mediterrán életstílus és a történelem varázsa vár rád. Ciprus, a Napos Észak közepén, elvarázsol mindenkit, aki ellátogat erre a mesés helyre.</p><br>
        
        <h3>Történelmi Látnivalók és Hagyományok</h3>
        <p>Ciprus gazdag történelmi örökséggel rendelkezik, amelyet érdemes felfedezni. Látogass el a híres Paphos ókori romjaihoz, ahol a görög mitológia és a római kultúra találkozik. Csodáld meg a Limassol középkori kikötőjét, ahol az ókori hajók és a modern jachtok elegánsan összefonódnak.</p><br>

        <h3>Varázslatos Tengerpartok és Hangulatos Falvak</h3>
        <p>Ciprus gyönyörű tengerpartjai és hangulatos falvai lenyűgözik és inspirálják azokat, akik ellátogatnak ide. Merülj el az Ayia Napa élénk strandjainak és szórakozóhelyeinek világában, vagy pihenj el a Larnaka békés partjain, ahol a homokos strandok és a hűsítő tengerfuvallatok várják.</p>
     </div>',
    '',
    232000
WHERE
	not exists (select 1 from trips where Country='Ciprus' and Hotel='La C Mer');

Insert into trips (Country,Hotel,City,Address,Content,Map,Price)
select 
	'Japán',
    'Hotel Grand City',
    'Tokió',
    'Higashiikebukuro 1-30-7',
    '<div>
        <h1>Fedezd fel a Csodálatos Japánt Utazásunkkal!</h1>
        <p>Készülj fel arra, hogy belemerülj a japán kultúra és hagyományok lenyűgöző világába az utazásunk során! Japán, az Ázsia gyöngyszeme, egy olyan ország, ahol a modern technológia és az ősi hagyományok harmonikusan egyesülnek, hogy lenyűgözzenek mindenkit, aki az országba látogat.
        Fedezd fel a Mount Fuji lenyűgöző szépségét, és látogass el a híres Fushimi Inari-taisho szentélyhez, ahol az ezer vörös torii kapu útvesztője egy különleges spirituális élményt nyújt. Lépj be a világ legnagyobb halpiacára, a Tsukiji halpiacra, és élvezd az ott kínált friss tengeri finomságokat.</p><br>
        
        <h3>Kulturális Élmények</h3>
        <p>Utazásunk során lehetőséged lesz felfedezni a japán kulturális kincseket, miközben barangolsz a festői Kyoto szűk utcáin, ahol az ősi templomok és kertek varázslatos világa vár. Csodáld meg a híres Arashiyama bambuszligetet, és lépj vissza az időben a hagyományos japán teaházakban, ahol a matcha tea és a wagashi édes csemegék várják, hogy megédesítsék az életedet.</p><br>

        <h3>Modern Csodák</h3>
        <p>Japán nem csupán a múltba tekint, hanem a jövőbe is, és utazásunk során megismerkedhetsz a modern városok, mint például Tokió, lenyűgöző világával is. Fedezd fel a világ legforgalmasabb városának izgalmas belvárosát, ahol a futurisztikus épületek és a vibráló élet mindenhol jelen van. Ne hagyd ki a Tokyo Skytree-t, ahonnan lenyűgöző kilátás nyílik az egész városra.</p>
        
        <p>Csatlakozz hozzánk ezen a különleges japán utazáson, és hagyd, hogy átöleljen a japán kultúra és gasztronómia varázsa! Kényelmes szállások, tapasztalt idegenvezetők és lenyűgöző látnivalók várnak rád, hogy felejthetetlen élményekkel teli utazást nyújtsanak számodra. Ne habozz, és foglalj helyet már ma!</p>     
     </div>',
     '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5446.992926277537!2d139.71650626652507!3d35.731103214865556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d66095bb797%3A0x1f15561f588e1ffe!2sHotel%20Grand%20City!5e0!3m2!1shu!2shu!4v1712867873706!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
     335000
WHERE 
    not exists (select 1 from trips where Country='Japán' and Hotel='Hotel Grand City');

Insert into trips (Country,Hotel,City,Address,Content,Map,Price)
select 
	'Spanyolország',
    'Universal Hotel Marques',
    'Mallorca',
    'Placa Moli de sa Sal',
    '<div>
        <h1>Fedezd fel a Varázslatos Mallorca-szigetét utazásunkkal!</h1>
        <p>Csatlakozz hozzánk egy különleges utazásra a gyönyörű Mallorca szigetére, ahol a mediterrán életstílus és a lenyűgöző természeti szépségek varázsa összetalálkozik. Mallorca, a Baleár-szigetek egyik ékessége, elvarázsol mindenkit, aki ellátogat erre a mesés helyre.</p><br>
        
        <h3>Kulturális Élmények és Festői Városok</h3>
        <p>Mallorca-szigetén nemcsak a természet szépségeit, hanem a kulturális gazdagságát is felfedezheted. Barangolj a festői régi városok szűk utcáin, és csodáld meg a hagyományos mediterrán építészeti stílus jellegzetességeit. Ne hagyd ki a Palma de Mallorca lenyűgöző katedrálisát és a spanyol történelemmel átitatott városképet.</p><br>

        <h3>Gyönyörű Tengerpartok és Rejtett Öblök</h3>
        <p>Utazásunk során felfedezheted Mallorca lenyűgöző tengerpartjait és homokos strandjait, amelyek között az idilli öblök és sziklás partszakaszok is helyet kapnak. Merülj el a kristálytiszta vízben, és pihenj el a napfényben a varázslatos tengerpartokon, ahol a nyugalom és a szabadság érzése tölt el.</p>
        
        <p>Csatlakozz hozzánk, és fedezd fel Mallorca minden titkát és varázsát ezen a lenyűgöző utazáson. Tapasztalt idegenvezetőink és kényelmes szállásaink garantálják, hogy felejthetetlen élményekkel térj vissza otthonodba. Ne habozz, és foglalj helyet már ma!</p>     
     </div>',
     '<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d8730.104482455381!2d2.983273747563355!3d39.320940560430806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smallorca%20hotel!5e0!3m2!1shu!2shu!4v1712870619240!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
     190000
WHERE 
    not exists (select 1 from trips where Country='Spanyolország' and Hotel='Universal Hotel Marques');

Insert into trips (Country,Hotel,City,Address,Content,Map,Price)
select 
	'Egyesült Államok',
    'The Manhattan at Times Square Hotel',
    'New York',
    '790 7th Ave',
    '<div>
        <h1>Fedezd fel a Varázslatos New York Cityt! </h1>
        <p>Fények, izgalom és lehetőségek várnak rád minden sarkon! Fedezd fel a város ikonikus látnivalóit és kulturális sokszínűségét! New York: ahol minden pillanat egy újabb álom valóra váltását ígéri!</p><br>
        
        <h3>Ikonikus Látnivalók és Híres Terei</h3>
        <p>New York City nem csupán város, hanem egy egész életstílus, amelyet a híres látnivalók és ikonikus terek tesznek még emlékezetesebbé. Barangolj a Central Park zöldellő oázisában, csodáld meg a Szabadság-szobor impozáns szépségét, és merülj el a Times Square fényeiben és forgatagában.</p><br>

        <h3>Kulturális Élet és Világhírű Múzeumok</h3>
        <p>New York City gazdag kulturális élete mindenkit lenyűgöz, aki ellátogat ide. Látogass el a Metropolitan Múzeumba, ahol a világ legnagyobb művészeti gyűjteménye vár rád, és fedezd fel a Guggenheim Múzeum modern művészetének lenyűgöző világát. Ne hagyd ki a Broadway színházi előadásait, ahol a világ legjobb előadóművészei lépnek színpadra.</p>
     </div>',
     '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115115.6155508826!2d-74.14350803446402!3d40.69578535395547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258f88254f2c3%3A0xe0e14597c5400022!2sThe%20Manhattan%20at%20Times%20Square%20Hotel!5e0!3m2!1shu!2shu!4v1712871004800!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
     290000
WHERE 
    not exists (select 1 from trips where Country='Egyesült Államok' and Hotel='The Manhattan at Times Square Hotel');

Insert into trips (Country,Hotel,City,Address,Content,Map,Price)
select 
	'Görögország',
    'Lefka Hotel & Apartments',
    'Rodosz',
    'Kokkidi 4',
    '<div>
        <h1>Keresd fel a történelem és a napfény szigetét, Rodoszt!</h1>
        <p>Készülj fel egy kalandra a lenyűgöző Rodosz-szigeten, ahol a történelem és a természet szépségei összetalálkoznak. Rodosz, a görög szigetek egyik ékessége, lenyűgözi és elbűvöli azokat, akik felfedezik ezt a csodálatos helyet.</p><br>
        
        <h3>Ókori Várak és Mesés Partok</h3>
        <p>Rodosz gazdag történelme és lenyűgöző tájai varázsolnak el mindenkit, aki ellátogat ide. Látogass el a híres Rodoszi Óvárosba, ahol az ókori várak és falak titkokat rejtő labirintusai várják felfedezésre. Pihenj el a gyönyörű tengerpartokon, amelyek kristálytiszta vízzel és aranyhomokkal kápráztatnak el.</p><br>

        <h3>Kirándulások és Aktív Szabadidős Tevékenységek</h3>
        <p>Rodosz sok lehetőséget kínál az aktív szabadidős tevékenységekre és kalandokra vágyóknak. Fedezd fel a sziget lenyűgöző természeti látnivalóit, mint például a Szárnyasok Völgye vagy a Hét Források termálvizes forrásai. Vagy merülj el a tenger mélyén egy búvárkodás során, és fedezd fel a tenger alatti világ csodáit.</p>
     </div>',
     '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61072.86212244715!2d28.138918480331018!3d36.439501699947655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x149561c0c67e397f%3A0x461b7b9754489c47!2sLefka%20Hotel%20%26%20Apartments!5e0!3m2!1shu!2shu!4v1712871473452!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
     97000
WHERE 
    not exists (select 1 from trips where Country='Görögország' and Hotel='Lefka Hotel & Apartments');

/*Képek*/