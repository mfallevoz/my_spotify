import React, { useEffect } from "react";
import { Link } from "react-router-dom";
import { BsFillHouseFill } from "react-icons/bs";
import { FaMicrophoneAlt } from "react-icons/fa";
import { BiSearchAlt } from "react-icons/bi";
import { MdLibraryMusic, MdOutlineQueueMusic, MdAlbum } from "react-icons/md";
import { FaSpotify, FaEllipsisH } from "react-icons/fa";

/* Contents */
import ArtistsPage from "../pages/ArtistsPage";
import SearchPage from "../pages/SearchPage";
import AlbumPage from "../pages/AlbumPage";
import GenderPage from "../pages/GenderPage";
import MusicPage from "../pages/MusicPage";
import TrackList from "./TrackList";

const LeftMenu = () => {
  const menuList = [
    {
      id: 1,
      icon: <BsFillHouseFill />,
      name: "Accueil",
      href: "/",
      content: <AlbumPage />,
    },
    {
      id: 2,
      icon: <BiSearchAlt />,
      name: "Recherche",
      href: "/recherche",
      content: <SearchPage />,
    },
    {
      id: 3,
      icon: <MdOutlineQueueMusic />,
      name: "Musiques",
      href: "/musiques",
      content: <MusicPage />,
    },
    {
      id: 4,
      icon: <MdLibraryMusic />,
      name: "Genres",
      href: "/genres",
      content: <GenderPage />,
    },
    {
      id: 5,
      icon: <MdAlbum />,
      name: "Albums",
      href: "/albums",
      content: <AlbumPage />,
    },
    {
      id: 6,
      icon: <FaMicrophoneAlt />,
      name: "Artistes",
      href: "/artistes",
      content: <ArtistsPage />,
    },
  ];

  useEffect(() => {
    const allLi = document
      .querySelector(".menuContainer ul")
      .querySelectorAll("li");

    function changeMenuActive() {
      allLi.forEach((n) => n.classList.remove("active"));
      this.classList.add("active");
    }

    allLi.forEach((n) => n.addEventListener("click", changeMenuActive));
  }, []);

  return (
    <div className="leftMenu">
      <div className="logoContainer">
        <i>
          <FaSpotify />
        </i>
        <h2>Spotify</h2>
        <i>
          <FaEllipsisH />
        </i>
      </div>
      <div className="menuContainer">
        <p className="title">Menu</p>

        <ul>
          {menuList &&
            menuList.map((menu) => (
              <li key={menu.id}>
                <Link to={menu.href}>
                  <i>{menu.icon}</i>
                  <span>{menu.name}</span>
                </Link>
              </li>
            ))}
        </ul>
      </div>

      <TrackList />
    </div>
  );
};

export default LeftMenu;
