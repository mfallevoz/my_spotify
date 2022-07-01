import React from "react";
import { FaHeart, FaRegHeart } from "react-icons/fa";
import "../styles/components/_audioBar.scss";

const AudioBar = () => {
  return (
    <div className="musicPlayer">
      <div className="songImage"></div>
      <div className="songAttributes">
        <audio src="" preload="metadata" />
        <div className="top">
          <div className="left">
            <div className="loved">
              <i>
                <FaRegHeart />
              </i>

              <i>
                <FaHeart />
              </i>
            </div>
          </div>
          <div className="middle"></div>
          <div className="right"></div>
        </div>
        <div className="bottom"></div>
      </div>
    </div>
  );
};

export default AudioBar;
