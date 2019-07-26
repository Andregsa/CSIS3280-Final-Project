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
  (1, 1,"The Lion King", 1994, 88,"Animation, Adventure, Drama, Family, Musical","A Lion cub crown prince 
  is tricked by a treacherous uncle into thinking he caused his father's death and flees into exile in 
  despair, only to learn in adulthood his identity and his responsibilities",
  "https://m.media-amazon.com/images/M/MV5BYTYxNGMyZTYtMjE3MS00MzNjLWFjNmYtMDk3N2FmM2J
  iM2M1XkEyXkFqcGdeQXVyNjY5NDU4NzI@._V1_SX300.jpg",6.8 ,"My Favourite Movies"),
  (2, 1, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ,"My Favourite Movies"),
  (3, 2, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8,"Saturday Night Favs");
  


  INSERT INTO LatestTrailers VALUES
   (1, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (2, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (3, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8),
  (4, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (5, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (6, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8),
    (7, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (8, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (9, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8),
  (10, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (11, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (12, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8);

    INSERT INTO TopRated VALUES
  (1, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (2, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (3, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8),
  (4, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (5, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (6, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8),
    (7, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (8, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (9, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8),
  (10, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (11, "Avengers Endgame", 2019, 181, "Action, Adventure, Sci-Fi","After the devastating events of 
  Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, 
  the Avengers assemble once more in order to reverse Thanos' actions and restore balance to 
  the universe.","https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg",6.8 ),
  (12, "Avatar", 2009, 162, "Action, Adventure, Fantasy, Sci-Fi", "A paraplegic Marine dispatched 
  to the moon Pandora on a unique mission becomes torn between following his orders and protecting 
  the world he feels is his home.","https://m.media-amazon.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg",6.8);
