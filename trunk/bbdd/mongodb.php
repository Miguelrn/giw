<?php
	require_once '../controlador/opbasededatosMongoDB.php';

	/**
	 * Aqui pondría las consultas para insertar los datos en mongo DB, por si no funcionase
	 * el tema del import y el export.
	 */
	$mongo = new MongoDBConector();
    $cursor = $mongo->conseguirArticulo("ABBA");	
	foreach ($cursor as $doc) {
	    //var_dump($doc);
	    echo $doc['categoria'];
	}
	
//////////ELIMINAR BBDD/////////
	$mongo->eliminarBDD();
	
///////////ATICULOS///////////
	$mongo->insertarUsuario("test@test.com", "test", "nombreTest",  "apellidoTest", "10", "domicilioTest");
	// echo "</br>Existe usuario:" . ($mongo->existeUsuario("test@test.com") ? "Si" : "No");
	// $mongo->eliminarUsuario("test@test.com");
	$mongo->modificarUsuario("test@test.com", "testModificado", "nombreTest", "datosBancariosTest", "apellidoTest", "10", "domicilioTest");
	
///////////ATICULOS///////////
/*$valoraciones = array(array("correo" => "a@a.com", "nota" => 7,"opinion" => "dfgdfg"), 
array("correo" => "c@c.com", "nota" => 3, "opinion" =>  "Me gusto mas su primer disco"), 
array("correo" => "b@b.com", "nota" => 10, "opinion" =>  "Perfecto, rosa vuelve a sus origenes"));
echo $valoraciones[2]["opinion"];*/
	$mongo->insertarArticulo("24 Shots", 40, NULL, "Rap", "50Cents", 2003, "50_Cent-24_Shots-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("ABBA", 50, NULL, "Pop", "ABBA", 1975, "Abba-Abba-Frontal.jpg", 11.00, 0, array(array("correo" => "a@a.com", "nota" => 9, "opinion" => "Es un disco que me emociono mucho")));
	$mongo->insertarArticulo("Black Ice", 49, NULL, "Rock", "ACDC", 2008, "Ac_Dc-Black_Ice-Frontal.jpg", 19.00, 0, array(array("correo" => "a@a.com", "nota" => 10, "opinion" => "viva El heavy")));
	$mongo->insertarArticulo("Aerosmith", 48, NULL, "Rock", "Aerosmith", 1973, "Aerosmith-Aerosmith-Frontal.jpg", 15.00, 0);
	$mongo->insertarArticulo("Alanis", 50, NULL, "Pop", "Alanis Morrisette", 1991, "Alanis_Morissette-Alanis-Frontal.jpg", 9.00, 0);
	$mongo->insertarArticulo("Con el alma al aire", 50, NULL, "Pop", "A.Sanz", 2000, "Alejandro_Sanz-El_Alma_Al_Aire-Frontal.jpg", 6.00, 0);
	$mongo->insertarArticulo("As I Am", 43, NULL, "R&B", "AliciaKey", 2007, "Alicia_Keys-As_I_Am-Frontal.jpg", 6.00, 0);
	$mongo->insertarArticulo("Aquarium", 50, NULL, "Electronica/Dance", "Aqua", 1997, "Aqua-Aquarium-Frontal.jpg", 6.00, 0);
	$mongo->insertarArticulo("Avril Lavigne", 47, NULL, "Rock", "Avril Lavigne", 2011, "avril_lavigne-avril_lavigne-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Buleria", 50, NULL, "Folclorica", "David Bisbal", 2004, "David_Bisbal-Buleria-Frontal.jpg", 8.00, 0);
	$mongo->insertarArticulo("Violator", 50, NULL, "Rock", "Depeche Mode", 1990, "Depeche_Mode-Violator-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Kaleidoscope", 48, NULL, "Electronica/Dance", "Tiesto", 2008, "Dj_Tiesto-Kaleidoscope-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Canciones", 50, NULL, "Pop", "DuncanDhu", 1986, "Duncan_Dhu-Canciones-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Europop", 44, NULL, "Electronica/Dance", "Eiffel65", 1999, "Eiffel_65-Europop-Frontal.jpg", 12.00, 0);
	$mongo->insertarArticulo("A Mi Na Ma", 50, NULL, "Folclorica", "El Arrebato", 2005, "El_Arrebato-A_Mi_Na_Ma_(CD_Single)-Frontal.jpg", 10.00, 0);
	$mongo->insertarArticulo("Angel Malherido", 50, NULL, "Folclorica", "El Barrio", 2003, "El_Barrio-Angel_Malherido-Frontal.jpg", 16.00, 0);
	$mongo->insertarArticulo("Eminem Is Back", 48, NULL, "Rap", "Eminem", 2004, "Eminem-Eminem_Is_Back-Frontal.jpg", 16.00, 0);
	$mongo->insertarArticulo("Destrangis", 50, NULL, "Pop", "Estopa", 2001, "Estopa-Destrangis-Frontal.jpg", 15.00, 0);
	$mongo->insertarArticulo("Bring Me To Life", 50, "NULL", "Rock", "Evanescence", 2001, "Evanescence-Bring_Me_To_Life_(Daredevil_Promo)-Frontal.jpg", 13.00, 0, array(array("correo" => "a@a.com", "nota" => 6, "opinion" => "hola mundo")));
	$mongo->insertarArticulo("Agila", 50, NULL, "Rock", "Extremoduro", 1996, "Extremoduro-Agila-Frontal.jpg", 11.00, 0);
	$mongo->insertarArticulo("Back To Bedlam", 50, NULL, "Pop", "James Blunt", 2004, "James_Blunt-Back_To_Bedlam-Frontal.jpg", 20.00, 0);
	$mongo->insertarArticulo("Sex Machine", 49, NULL, "R&B", "James Brown", 1970, "James_Brown-Sex_Machine-Frontal.jpg", 12.00, 0);
	$mongo->insertarArticulo("A Funk Oddyssey", 49, NULL, "Jazz", "Jamiroquei", 2001, "Jamiroquai-A_Funk_Oddyssey-Frontal.jpg", 15.00, 0);
	$mongo->insertarArticulo("Love?", 50, NULL, "R&B", "Jennifer Lopez", 2011, "jennifer_lopez-love_-Frontal.jpg", 16.00, 0);
	$mongo->insertarArticulo("Blue Wild Angel", 50, NULL, "Rock", "Jimi Hendrix", 2002, "Jimi_Hendrix-Blue_Wild_Angel-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("A Dios Le Pido", 50, NULL, "Rock", "Juanes", 2002, "juanes-a_dios_le_pido-Frontal.jpg", 12.00, 0);
	$mongo->insertarArticulo("1100 Bel Air Plac", 50, NULL, "Pop", "J. Iglesias", 1984, "julio_iglesias-1100_bel_air_place-Frontal.jpg", 16.00, 0, array(array("correo" => "a@a.com", "nota" => 8, "opinion" => "yeah!")));
	$mongo->insertarArticulo("Be Here Now", 50, NULL, "Rock", "Oasis", 1997, "Oasis-Be_Here_Now-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Antropop", 43, NULL, "Electronica/Dance", "Obk", 1991, "Obk-Antropop-Frontal.jpg", 10.00, 0);
	$mongo->insertarArticulo("Ixnay On The Hombr", 50, NULL, "Rock", "Offspring", 1997, "Offspring-Ixnay_On_The_Hombre-Frontal.jpg", 16.00, 0);
	$mongo->insertarArticulo("A Lo Cubano", 49, NULL, "Rap", "Orishas", 1999, "Orishas-A_Lo_Cubano-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Almoraima", 50, NULL, "Folclorica", "Paco de Lucia", 1976, "Paco_De_Lucia-Almoraima-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("El Mono Espabilado", 50, NULL, "Pop", "P. Guerra", 2011, "pedro_guerra-el_mono_espabilado-Frontal.jpg", 16.00, 0);
	$mongo->insertarArticulo("Algo Para Cantar", 50, NULL, "Pop", "Perez", 2002, "Pereza-Algo_Para_Cantar-Frontal.jpg", 14.00, 0);
	$mongo->insertarArticulo("Actually", 50, NULL, "Electronica/Dance", "Pet Shop Boys", 1987, "Pet_Shop_Boys-Actually-Frontal.jpg", 15.00, 0);
	$mongo->insertarArticulo("Both Sides of the", 50, NULL, "Pop", "P. Collins", 1993, "phil_collins-both_sides_of_the_story_(cd_single)-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("8th Rd From The Moon", 49, NULL, "Rock", "P. Floyd", 1969, "Pink_Floyd-8th_Rd_From_The_Moon-Frontal.jpg", 16.00, 0);
	$mongo->insertarArticulo("Burrock N Roll", 50, NULL, "Rock", "Platero y Tu", 1992, "Platero_Y_Tu-Burrock_N_Roll-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Amerika", 50, NULL, "Rock", "Rammstein", 2004, "Rammstein-Amerika_(Cd_Single)-Frontal.jpg", 14.00, 0);
	$mongo->insertarArticulo("californication", 50, NULL, "Rock", "RHCP", 1999, "Red_Hot_Chili_Peppers-Californication-Frontal.jpg", 20.00, 0);
	$mongo->insertarArticulo("Body y Soul", 50, NULL, "Pop", "Rick Astley", 1993, "rick_astley-body_y_soul-Frontal.jpg", 16.00,  0);
	$mongo->insertarArticulo("Be a Boy", 50, NULL, "Rock", "R. Williams", 1999, "robbie_williams-be_a_boy_(cd_single)-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Canciones Que Amo", 50, NULL, "Folclorica", "R. Carlos", 1984, "roberto_carlos-canciones_que_amo-Frontal.jpg", 5.00, 0);
	$mongo->insertarArticulo("Amor Eterno", 50, NULL, "Folclorica", "Rocio Durcal", 2006, "Rocio_Durcal-Amor_Eterno-Frontal.jpg", 14.00, 0);
	$mongo->insertarArticulo("Como las Alas al Vi", 50, NULL, "Folclorica", "R. Jurado", 1993, "Rocio_Jurado-Como_Las_Alas_Al_Viento-Frontal.jpg", 8.00, 0);
	$mongo->insertarArticulo("Ahora", 49, NULL, "Pop", "Rosa", 2003, "Rosa-Ahora-Frontal.jpg", 15.00, 0, array(array("correo" => "a@a.com", "nota" => 10,"opinion" => "rosa, rosita"), array("correo" => "c@c.com", "nota" => 3, "opinion" =>  "Me gusto mas su primer disco"), array("correo" => "b@b.com", "nota" => 10, "opinion" =>  "Perfecto, rosa vuelve a sus origenes")));
	$mongo->insertarArticulo("A Night To Remember", 50, NULL, "Pop", "Roxette", 1994, "Roxette-A_Night_To_Remember-Frontal.jpg", 15.00, 0);
	$mongo->insertarArticulo("The Best", 50, NULL, "Pop", "TATU", 2006, "TATU-The_Best-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Outnumber", 50, NULL, "Electronica/Dance", "Prodigy", 2004, "The _Prodigy-Always_Outnumbered_Never_Outgunned-Frontal.jpg", 10.00, 0, array(array("correo" => "a@a.com", "nota" => 7,"opinion" => "dfgdfg")));
	$mongo->insertarArticulo("Abbey Road", 50, NULL, "Pop", "The Beatles", 1969, "The_Beatles-Abbey_Road-Frontal.jpg", 11.00, 0);
	$mongo->insertarArticulo("Brotherhood", 50, NULL, "Electronica/Dance", "Chemical Brothers", 2008, "The_Chemical_Brothers-Brotherhood-Frontal.jpg", 8.00, 0);
	$mongo->insertarArticulo("Borrowed Heaven", 49, NULL, "Pop", "The Corrs", 2004, "The_Corrs-Borrowed_Heaven-Frontal.jpg", 19.00, 0);
	$mongo->insertarArticulo("4 13 Dream", 50, NULL, "Rock", "The Cure", 2008, "The_Cure-4_13_Dream-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Every Breath You", 50, "NULL", "Rock", "The Police", 1983, "The_Police-Every_Breath_You_Take-Frontal.jpg", 13.00, 0);  
	$mongo->insertarArticulo("Jilted Generation", 50, NULL, "Electronica/Dance", "Prodigy", 1995, "The_Prodigy-Music_For_The_Jilted_Generation-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("Endless Wire", 50, NULL, "Rock", "The Who", 2006, "The_Who-Endless_Wire-Frontal.jpg", 15.00, 0);
	$mongo->insertarArticulo("52 Classic Hits", 49, NULL, "Pop", "Tom Jones", 2006, "Tom_Jones-52_Classic_Hits-Frontal.jpg", 12.00, 0);
	$mongo->insertarArticulo("En Libertad", 50, NULL, "Rock", "Triana", 1991, "Triana-En_Libertad-Frontal.jpg", 13.00, 0);
	$mongo->insertarArticulo("I Look To You", 50, NULL, "Pop", "W. Houston", 2009, "Whitney_Houston-I_Look_To_You-Frontal.jpg", 12.00, 0);
	
	
?>