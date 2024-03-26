CREATE DATABASE IF NOT EXISTS`mi`
CHARACTER SET utf8 COLLATE utf8_general_ci;

USE mi;

/*Felhaszn�l�k*/
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

/*utaz�sok*/
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

/*k�pek*/
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
        <p>A Lorem Ipsum egy egyszer? sz�vegr�szlete, sz�vegut�nzata a bet?szed? �s nyomdaiparnak. A Lorem Ipsum az 1500-as �vek �ta standard sz�vegr�szletk�nt szolg�lt az iparban; mikor egy ismeretlen nyomd�sz �ssze�ll�totta a bet?k�szlet�t �s egy p�lda-k�nyvet vagy sz�veget nyomott pap�rra, ezt haszn�lta. Nem csak 5 �vsz�zadot �lt t�l, de az elektronikus bet?k�szletekn�l is v�ltozatlanul megmaradt. Az 1960-as �vekben n�pszer?s�tett�k a Lorem Ipsum r�szleteket magukbafoglal� Letraset lapokkal, �s legut�bb softwarekkel mint p�ld�ul az Aldus Pagemaker.</p><br>
        
        <h3>Mi�rt haszn�ljuk?</h3>
        <p>Ez egy r�g�ta elfogadott t�ny, miszerint egy olvas�t zavarja az olvashat� sz�veg mik�zben a sz�veg elrendez�s�t n�zi. A Lorem Ipsum haszn�lat�nak l�nyege, hogy t�bb�-kev�sb� rendezettebb bet?ket tartalmaz, ellent�tben a Tartalom helye, Tartalom helye-f�le megold�ssal. Sok desktop szerkeszt? �s weboldal szerkeszt? haszn�lja a Lorem Ipsum-ot mint alapbe�ll�t�s� sz�vegmodellt, �s egy keres�s a lorem ipsum-ra sok f�lk�sz weboldalt fog eredm�nyezni.</p><br>

        <h3>Honnan sz�rmazik?</h3>
        <p>A hiedelemmel ellent�tben a Lorem Ipsum nem v�letlenszer? sz�veg. Gy�kerei egy Kr. E. 45-�s latin irodalmi klasszikushoz ny�lnak. Richarrd McClintock a virginiai Hampden-Sydney egyetem professzora kikereste az ismeretlenebb latin szavak k�z�l az egyiket (consectetur) egy Lorem Ipsum r�szletb?l, �s a klasszikus irodalmat �tkutatva vitathatatlan forr�st tal�lt. A Lorem Ipsum az 1.10.32 �s 1.10.33-as de Finibus Bonoruem et Malorum r�szleteib?l sz�rmazik (A J� �s Rossz hat�rai - Cicero), Kr. E. 45-b?l. A k�nyv az etika elm�let�t tanulm�nyozza, ami nagyon n�pszer? volt a renesz�nsz korban. A Lorem Ipsum els? sora, Lorem ipsum dolor sit amet.. a 1.10.32-es bekezd�sb?l sz�rmazik.</p>
        
        <p>A Lorem Ipsum alapr�szlete, amit az 1500-as �vek �ta haszn�ltak, az �rdekl?d?k kedv��rt lent �jra megtekinthet?. Az 1.10.32 �s 1.10.33-as bekezd�seket szint�n eredeti form�jukban reproduk�lt�k a hozz� tartoz� angol v�ltozattal az 1914-es ford�t�sb�l H. Rackhamt�l.</p>     
     </div>',
    '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d578.3767773149482!2d33.63755956267434!3d34.91164062718759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1shu!2shu!4v1711486320709!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
WHERE
	not exists (select 1 from trips where Country='Ciprus' and Hotel='La C Mer')
