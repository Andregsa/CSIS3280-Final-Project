USE movie_hunter;

INSERT INTO User VALUES
  (1,'$2y$10$1O9YQhsIZFQdTOACpigXtOGyLTVGCFchzRrhLzxH3pLLpgokihjWS','jsmith@gmail.com', 'Julie', 'Smith', '1997-04-02'),
  (2,'$2y$10$6N0.RdzBavNmrIYJpZV2heYCoPjxjWof.fsf26Q2d1pkhNKGsAc7e','awong@gmail.com', 'Alan','Wong', '1997-10-12'),
  (3,'$2y$10$u.CuPl.igZL6a0M7eSMuqOvPcqpYm9tNUVq7DTp4FW60Orieni68G','marthur@gmail.com', 'Michelle','Arthur', '1999-04-10');

INSERT INTO WatchedMovies VALUES
  (4,1,3,'2019-04-15',4.3),
  (5,1,3,'2019-07-15',7.5),
  (6,2,2,'2019-06-06',10.40);


INSERT INTO MyMovies VALUES
  (1, 1,"IMDBID","The Lion King", "1994", 88,"Animation, Adventure, Drama, Family, Musical","A Lion cub crown prince 
  is tricked by a treacherous uncle into thinking he caused his father's death and flees into exile in 
  despair, only to learn in adulthood his identity and his responsibilities",
  "https://m.media-amazon.com/images/M/MV5BYTYxNGMyZTYtMjE3MS00MzNjLWFjNmYtMDk3N2FmM2J
  iM2M1XkEyXkFqcGdeQXVyNjY5NDU4NzI@._V1_SX300.jpg",6.8 ,"My Favourite Movies"),
  (2, 1,"tt4154796","Avengers Endgame", "2019", 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ,"My Favourite Movies"),
  (3, 2, "tt0499549","Avatar", "2009", 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8,"Saturday Night Favs");
  



  INSERT INTO HomePageMovies VALUES
  (1, "Once Upon a Time ... in Hollywood", 2019, 161, "Comedy, Drama","A faded television actor and his stunt double strive to achieve fame and success in the film industry during the final years of Hollywood's Golden Age in 1969 Los Angeles.","https://m.media-amazon.com/images/M/MV5BOTg4ZTNkZmUtMzNlZi00YmFjLTk1MmUtNWQwNTM0YjcyNTNkXkEyXkFqcGdeQXVyNjg2NjQwMDQ@._V1_SX300.jpg",9.3,"Latest Trailers","tt7131622" ),
  (2, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8, "Latest Trailers","tt4154796"),
  (3, "The Lion King", 2019, 118, "Animation, Adventure, Drama, Family, Musical", "After the murder of his father, a young lion prince flees his kingdom only to learn the true meaning of responsibility and bravery.","https://m.media-amazon.com/images/M/MV5BMjIwMjE1Nzc4NV5BMl5BanBnXkFtZTgwNDg4OTA1NzM@._V1_SX300.jpg",7.2, "Latest Trailers","tt6105098"),
 
  (4, "Fast & Furious Presents: Hobbs & Shaw", 2019, 135, "Action, Adventure","Lawman Luke Hobbs and outcast Deckard Shaw form an unlikely alliance when a cyber-genetically enhanced villain threatens the future of humanity.","https://m.media-amazon.com/images/M/MV5BOTIzYmUyMmEtMWQzNC00YzExLTk3MzYtZTUzYjMyMmRiYzIwXkEyXkFqcGdeQXVyMDM2NDM2MQ@@._V1_SX300.jpg","N/A","Latest Trailers" ,"tt6806448" ),
 
  (5, "Gemini Man", 2019, "N/A", "Action, Drama, Sci-Fi, Thriller","An over-the-hill hitman faces off against a younger clone of himself.","https://m.media-amazon.com/images/M/MV5BNjI5OTNkMzUtZDYzYy00NWQ5LTg4YzYtZmZjZDI0MGQzNGY2XkEyXkFqcGdeQXVyNjg2NjQwMDQ@._V1_SX300.jpg","N/A" ,"Latest Trailers","tt1025100" ),
 
  (6, "John Wick: Chapter 3 - Parabellum", 2019, 121, "Action, Crime, Thriller", "Super-assassin John Wick is on the run after killing a member of the international assassin's guild, and with a $14 million price tag on his head - he is the target of hit men and women everywhere.","https://m.media-amazon.com/images/M/MV5BMDg2YzI0ODctYjliMy00NTU0LTkxODYtYTNkNjQwMzVmOTcxXkEyXkFqcGdeQXVyNjg2NjQwMDQ@._V1_SX300.jpg",7.9,"Latest Trailers","tt6146586" ),
 
  (7, "The Farewell", 2019, 98, "Action, Adventure, Sci-Fi","A Chinese family discovers their grandmother has only a short while left to live and decide to keep her in the dark, scheduling a wedding to gather before she dies.","https://m.media-amazon.com/images/M/MV5BMWE3MjViNWUtY2VjYS00ZDBjLTllMzYtN2FkY2QwYmRiMDhjXkEyXkFqcGdeQXVyODQzNTE3ODc@._V1_SX300.jpg",6.9,"Latest Trailers","tt8637428"  ),
 
  (8, "Men in Black: International", 2019, 114, "Action, Adventure, Comedy, Sci-Fi","The Men in Black have always protected the Earth from the scum of the universe. In this new adventure, they tackle their biggest threat to date: a mole in the Men in Black organization.","https://m.media-amazon.com/images/M/MV5BMDZkODI2ZGItYTY5Yi00MTA4LWExY2ItM2ZmNjczYjM0NDg1XkEyXkFqcGdeQXVyMzY0MTE3NzU@._V1_SX300.jpg",5.7,"Latest Trailers","tt2283336"  ),
  
  (9, "Alita: Battle Angel", 2019, 122, "Action, Adventure, Sci-Fi, Thriller", "A deactivated female cyborg is revived, but cannot remember anything of her past life and goes on a quest to find out who she is.","https://m.media-amazon.com/images/M/MV5BNzVhMjcxYjYtOTVhOS00MzQ1LWFiNTAtZmY2ZmJjNjIxMjllXkEyXkFqcGdeQXVyNTc5OTMwOTQ@._V1_SX300.jpg",7.5, "Latest Trailers","tt0437086"),
  
  (10, "Angel Has Fallen", 2019, "N/A", "Action, Drama, Thriller","	Secret Service Agent Mike Banning is framed for the attempted assassination of the President and must evade his own agency and the FBI as he tries to uncover the real threat.","https://m.media-amazon.com/images/M/MV5BNGFhZjQ4NjItZGIzMy00ZWJmLWE1OTItZjMyOGMzZmMyZTUwXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_SX300.jpg","N/A", "Latest Trailers" ,"tt6189022"),
  
  (11, "Joker", 2019, "N/A", "Action, Adventure, Sci-Fi","A failed stand-up comedian is driven insane and becomes a psychopathic murderer.","https://m.media-amazon.com/images/M/MV5BMTcyNjU1MjQ3MF5BMl5BanBnXkFtZTgwNTk1MDA4NzM@._V1_SX300.jpg","N/A", "Latest Trailers","tt7286456" ),
  
  (12, "Toy Story 4", 2019, 100, "Animation, Adventure, Comedy, Family, Fantasy", "	When a new toy called Forky joins Woody and the gang, a road trip alongside old and new friends reveals how big the world can be for a toy.","https://m.media-amazon.com/images/M/MV5BMTYzMDM4NzkxOV5BMl5BanBnXkFtZTgwNzM1Mzg2NzM@._V1_SX300.jpg",8.2, "Latest Trailers","tt1979376"),
 
 
--  TOP RATED
 
 (13, "The Shawshank Redemption", 1994, 142, "Drama","Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.","https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg",9.3,"Top Rated","tt0111161" ),
  
  (14, "The Godfather", 1972, 175, "Crime, Drama","The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.","https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg",9.2, "Top Rated","tt0068646"),
  
  (15, "The Dark Knight", 2008, 152, "Action, Crime, Drama, Thriller", "When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.","https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg",9.0, "Top Rated","tt0468569"),
  
  (16, "Schindler's List", 1993, 195, "Biography, Drama, History","In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.","https://m.media-amazon.com/images/M/MV5BNDE4OTMxMTctNmRhYy00NWE2LTg3YzItYTk3M2UwOTU5Njg4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SX300.jpg",8.9,"Top Rated" ,"tt0108052" ),
  
  (17, "The Lord of the Rings: The Return of the King", 2003,201, "Adventure, Drama, Fantasy","Gandalf and Aragorn lead the World of Men against Sauron's army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.","https://m.media-amazon.com/images/M/MV5BNzA5ZDNlZWMtM2NhNS00NDJjLTk4NDItYTRmY2EwMWZlMTY3XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg",8.9 ,"Top Rated" ,"tt0167260"),
  
  (18, "Fight Club", 1999, 139, "Drama", "An insomniac office worker and a devil-may-care soapmaker form an underground fight club that evolves into something much, much more.","https://m.media-amazon.com/images/M/MV5BMjJmYTNkNmItYjYyZC00MGUxLWJhNWMtZDY4Nzc1MDAwMzU5XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg",8.8,"Top Rated","tt0137523" ),
  
    (19, "Forrest Gump", 1994, 142, "Drama, Romance","The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other history unfold through the perspective of an Alabama man with an IQ of 75.","https://m.media-amazon.com/images/M/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SX300.jpg",8.8,"Top Rated","tt0109830"),
  
  (20, "Inception", 2010, 148, "Action, Adventure, Sci-Fi, Thriller","A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O","https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SX300.jpg",8.8,"Top Rated","tt1375666"  ),
  
  (21, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8, "Top Rated","tt2283336"),
  
  (22, "Star Wars: Episode V - The Empire Strikes Back", 1980, 124, "Action, Adventure, Fantasy, Sci-Fi","After the Rebels are brutally overpowered by the Empire on the ice planet Hoth, Luke Skywalker begins Jedi training with Yoda, while his friends are pursued by Darth Vader.","https://m.media-amazon.com/images/M/MV5BYmU1NDRjNDgtMzhiMi00NjZmLTg5NGItZDNiZjU5NTU4OTE0XkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX300.jpg",8.7, "Top Rated","tt0080684" ),
  
  (23, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8, "Top Rated","tt2283336" ),
  
  (24, "City of God", 2002,130, "Crime, Drama", "	In the slums of Rio, two kids' paths diverge as one struggles to become a photographer and the other a kingpin.","https://m.media-amazon.com/images/M/MV5BMGU5OWEwZDItNmNkMC00NzZmLTk1YTctNzVhZTJjM2NlZTVmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg",8.6, "Top Rated","tt0317248");
