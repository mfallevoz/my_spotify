<?php
    namespace App;
    use App\Model;

    class ArtistModel extends Model {

        /**
         * fetchArtists
         *
         * Returns a list of artists.
         *
         * @param void
         * @return array Anonymous
         */
        public static function fetchArtists()
        {
            $Sql = "SELECT * FROM `artists`";
            Parent::query($Sql);

            $artists = Parent::fetchAll();
            if (empty($artists)) {
                return array(
                    'status' => false,
                    'data' => []
                );
            }

            return array(
                'status' => true,
                'data' => $artists
            );
        }

         /**
         * fetchArtistById
         *
         * fetches a Artist by it's Id
         *
         * @param int $Id  The Id of the row to be fetched...
         * @return array Anonymos
         */
        public static function fetchArtistById($Id)
        {
            $Sql = "SELECT id, name, description, bio, photo FROM `artists` WHERE id = :id";
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

        /**
         * fetchAlbumsByArtistID
         *
         * fetches a list of albums by artist id
         *
         * @param int $Id  The Id of the row to be fetched...
         * @return array Anonymos
         */
        public static function fetchAlbumsByArtistID($Id)
        {
            $Sql = "SELECT * FROM `albums` WHERE artist_id = :id";
            Parent::query($Sql);
            Parent::bindParams('id', $Id);
            $Data = Parent::fetchAll();

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