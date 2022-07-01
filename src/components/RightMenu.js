import React from "react";
import { FaBell, FaCrown } from "react-icons/fa";
import { AiTwotoneSetting } from "react-icons/ai";
import ProfilePic from "../img/Profil.png";

const RightMenu = () => {
  return (
    <div className="rightMenu">
      <div className="subscribe">
        <i>
          <FaCrown />
          <p>
            <span>Sub</span>scribe
          </p>
        </i>

        <i>
          <FaBell />
        </i>
      </div>
      <div className="profile">
        <i>
          <AiTwotoneSetting />
        </i>
        <div className="profileImage">
          <img src={ProfilePic} alt="Profil" />
        </div>
      </div>
    </div>
  );
};

export default RightMenu;
