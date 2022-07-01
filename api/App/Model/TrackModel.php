<?php
    namespace App;
    use App\Model;

    class TrackModel extends Model {

        /**
         * fetchTracks
         *
         * Returns a list of Tracks.
         *
         * @param void
         * @return array Anonymous
         */
        public static function fetchTracks()
        {
            $Sql = "SELECT * FROM `tracks`";
            Parent::query($Sql);

            $Tracks = Parent::fetchAll();
            if (empty($Tracks)) {
                return array(
                    'status' => false,
                    'data' => []
                );
            }

            return array(
                'status' => true,
                'data' => $Tracks
            );
        }

         /**
         * fetchTrackById
         *
         * fetches a Track by it's Id
         *
         * @param int $Id  The Id of the row to be fetched...
         * @return array Anonymos
         */
        public static function fetchTrackById($Id)
        {
            $Sql = "SELECT * FROM `tracks` WHERE id = :id";
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