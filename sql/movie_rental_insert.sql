USE movie_hunter;

INSERT INTO User VALUES
  (1,'$2y$10$1O9YQhsIZFQdTOACpigXtOGyLTVGCFchzRrhLzxH3pLLpgokihjWS','jsmith@gmail.com', 'Julie', 'Smith', '1997-04-02'),
  (2,'$2y$10$6N0.RdzBavNmrIYJpZV2heYCoPjxjWof.fsf26Q2d1pkhNKGsAc7e','awong@gmail.com', 'Alan','Wong', '1997-10-12'),
  (3,'$2y$10$u.CuPl.igZL6a0M7eSMuqOvPcqpYm9tNUVq7DTp4FW60Orieni68G','marthur@gmail.com', 'Michelle','Arthur', '1999-04-10');

INSERT INTO WatchedMovies VALUES
  (4,1,3,"title",'2019-04-15',4.3),
  (5,1,3,"title",'2019-07-15',7.5),
  (6,2,2,"title",'2019-06-06',10.40);


INSERT INTO MyMovies VALUES
  (1, 1,"IMDBID","The Lion King", 1994, 88,"Animation, Adventure, Drama, Family, Musical","A Lion cub crown prince 
  is tricked by a treacherous uncle into thinking he caused his father's death and flees into exile in 
  despair, only to learn in adulthood his identity and his responsibilities",
  "https://m.media-amazon.com/images/M/MV5BYTYxNGMyZTYtMjE3MS00MzNjLWFjNmYtMDk3N2FmM2J
  iM2M1XkEyXkFqcGdeQXVyNjY5NDU4NzI@._V1_SX300.jpg",6.8 ,"My Favourite Movies"),
  (2, 1,"tt4154796","Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ,"My Favourite Movies"),
  (3, 2, "tt0499549","Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
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
  
  (9, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8, "Latest Trailers","tt2283336"),
  
  (10, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8, "Latest Trailers" ,"tt2283336"),
  
  (11, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8, "Latest Trailers","tt2283336" ),
  
  (12, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8, "Latest Trailers","tt2283336"),
 (13, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8,"Top Rated","tt2283336" ),
  (14, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8, "Top Rated","tt2283336"),
  (15, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8, "Top Rated","tt2283336"),
  (16, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8,"Top Rated" ,"tt2283336" ),
  (17, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ,"Top Rated" ,"tt2283336"),
  (18, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8,"Top Rated","tt2283336" ),
    (19, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8,"Top Rated","tt2283336"  ),
  (20, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8,"Top Rated","tt2283336"  ),
  (21, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8, "Top Rated","tt2283336"),
  (22, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8, "Top Rated","tt2283336" ),
  (23, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8, "Top Rated","tt2283336" ),
  (24, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8, "Top Rated","tt2283336");
