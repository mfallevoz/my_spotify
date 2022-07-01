import React from "react";
import { BsFillVolumeUpFill, BsMusicNoteList } from "react-icons/bs";
import { FaDesktop } from "react-icons/fa";
import Track from "../img/track.png";

const TrackList = () => {
  return (
    <div className="trackList">
      <div className="top">
        <img src={Track} alt="" />
        <div className="text-track">
          <p className="trackName">Nom musique</p>
          <span className="trackArtist">Artiste</span>
        </div>
      </div>
      <div className="bottom">
        <i>
          <BsFillVolumeUpFill />
        </i>
        <input type="range" />
        <i>
          <BsMusicNoteList />
        </i>
        <i>
          <FaDesktop />
        </i>
      </div>
    </div>
  );
};

export default TrackList;
