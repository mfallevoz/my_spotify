<?php
    namespace App;
    use App\ArtistController;
    use App\AlbumController;

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, DELETE');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization');

    $Klein = new \Klein\Klein();

    $Klein->respond('GET', '/api/artists', [ new ArtistController(), 'fetchArtists' ]);
    $Klein->respond('GET', '/api/artists/[:id]', [ new ArtistController(), 'fetchArtistByID' ]);
    $Klein->respond('GET', '/api/artists/[:id]/albums', [ new ArtistController(), 'fetchAlbumsByArtistID' ]);

    $Klein->respond('GET', '/api/albums', [ new AlbumController(), 'fetchAlbums' ]);
    $Klein->respond('GET', '/api/albums/[:id]', [ new AlbumController(), 'fetchAlbumById' ]);
    
    $Klein->respond('GET', '/api/tracks', [ new TrackController(), 'fetchTracks' ]);
    $Klein->respond('GET', '/api/tracks/[:id]', [ new TrackController(), 'fetchTrackByID' ]);

    $Klein->respond('GET', '/api/genres', [ new GenreController(), 'fetchGenres' ]);
    $Klein->respond('GET', '/api/genres/[:id]', [ new GenreController(), 'fetchGenreByID' ]);

    // Dispatch all routes....
    $Klein->dispatch();