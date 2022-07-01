<?php
    namespace App;
    use App\Model;

    class GenreModel extends Model {

        /**
         * fetchGenres
         *
         * Returns a list of Genres.
         *
         * @param void
         * @return array Anonymous
         */
        public static function fetchGenres()
        {
            $Sql = "SELECT * FROM `genres`";
            Parent::query($Sql);

            $Genres = Parent::fetchAll();
            if (empty($Genres)) {
                return array(
                    'status' => false,
                    'data' => []
                );
            }

            return array(
                'status' => true,
                'data' => $Genres
            );
        }

         /**
         * fetchGenreById
         *
         * fetches a Genre by it's Id
         *
         * @param int $Id  The Id of the row to be fetched...
         * @return array Anonymos
         */
        public static function fetchGenreById($Id)
        {
            $Sql = "SELECT * FROM `genres` WHERE id = :id";
            Parent::query($Sql);
            Parent::bindParams('id', $Id);
            $Data = Parent::fetch();

            $Sql2 = "SELECT album_id AS id FROM genres AS g INNER JOIN genres_albums AS ga WHERE ga.genre_id = g.id && g.id = :id;";
            Parent::query($Sql2);
            Parent::bindParams('id', $Id);
            $Data2 = Parent::fetchAll();

            $Data['albums'] = $Data2;

            if (!empty($Data)) {
                return array(
                    'status' => true,
                    'data' => $Data
                );
            }

            return array(
                'status' => false,
                'data' => []
            );
        }
    }
?>