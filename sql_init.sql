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

/*dummies*/
Insert into trips (Country,Hotel,City,Address,Content,Map)
select 
	'Ciprus',
    'La C Mer',
    'Larnaka',
    'Valami utca 2.',
    '<div>
        <h1>Mi a Lorem Ipsum?</h1>
        <p>A Lorem Ipsum egy egyszer? szövegrészlete, szövegutánzata a bet?szed? és nyomdaiparnak. A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a bet?készletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus bet?készleteknél is változatlanul megmaradt. Az 1960-as években népszer?sítették a Lorem Ipsum részleteket magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.</p><br>
        
        <h3>Miért használjuk?</h3>
        <p>Ez egy régóta elfogadott tény, miszerint egy olvasót zavarja az olvasható szöveg miközben a szöveg elrendezését nézi. A Lorem Ipsum használatának lényege, hogy többé-kevésbé rendezettebb bet?ket tartalmaz, ellentétben a Tartalom helye, Tartalom helye-féle megoldással. Sok desktop szerkeszt? és weboldal szerkeszt? használja a Lorem Ipsum-ot mint alapbeállítású szövegmodellt, és egy keresés a lorem ipsum-ra sok félkész weboldalt fog eredményezni.</p><br>

        <h3>Honnan származik?</h3>
        <p>A hiedelemmel ellentétben a Lorem Ipsum nem véletlenszer? szöveg. Gyökerei egy Kr. E. 45-ös latin irodalmi klasszikushoz nyúlnak. Richarrd McClintock a virginiai Hampden-Sydney egyetem professzora kikereste az ismeretlenebb latin szavak közül az egyiket (consectetur) egy Lorem Ipsum részletb?l, és a klasszikus irodalmat átkutatva vitathatatlan forrást talált. A Lorem Ipsum az 1.10.32 és 1.10.33-as de Finibus Bonoruem et Malorum részleteib?l származik (A Jó és Rossz határai - Cicero), Kr. E. 45-b?l. A könyv az etika elméletét tanulmányozza, ami nagyon népszer? volt a reneszánsz korban. A Lorem Ipsum els? sora, Lorem ipsum dolor sit amet.. a 1.10.32-es bekezdésb?l származik.</p>
        
        <p>A Lorem Ipsum alaprészlete, amit az 1500-as évek óta használtak, az érdekl?d?k kedvéért lent újra megtekinthet?. Az 1.10.32 és 1.10.33-as bekezdéseket szintén eredeti formájukban reprodukálták a hozzá tartozó angol változattal az 1914-es fordításból H. Rackhamtól.</p>     
     </div>',
    '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d578.3767773149482!2d33.63755956267434!3d34.91164062718759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1shu!2shu!4v1711486320709!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
WHERE
	not exists (select 1 from trips where Country='Ciprus' and Hotel='La C Mer');

INSERT INTO images(TripId, ImageName, Path) VALUES(2, "japan", "../../Images/japan.jpg");