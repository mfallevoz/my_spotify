<?php
    namespace App;
    use App\Model;

    class AlbumModel extends Model {

        /**
         * fetchAlbums
         *
         * Returns a list of Albums.
         *
         * @param void
         * @return array Anonymous
         */
        public static function fetchAlbums()
        {
            $Sql = "SELECT * FROM `albums`";
            Parent::query($Sql);

            $albums = Parent::fetchAll();
            if (empty($albums)) {
                return array(
                    'status' => false,
                    'data' => []
                );
            }

            return array(
                'status' => true,
                'data' => $albums
            );
        }

         /**
         * fetchAlbumById
         *
         * fetches a Album by it's Id
         *
         * @param int $Id  The Id of the row to be fetched...
         * @return array Anonymos
         */
        public static function fetchAlbumById($Id)
        {
            $Sql = "SELECT id, artist_id, name, description, cover_small, release_date, popularity FROM `albums` WHERE id = :id";
            Parent::query($Sql);
            Parent::bindParams('id', $Id);
            $Data = Parent::fetch();

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