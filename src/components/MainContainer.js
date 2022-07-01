import React from "react";
import { Routes, Route } from "react-router-dom";
import { BsFillHouseFill } from "react-icons/bs";
import { BiSearchAlt } from "react-icons/bi";
import { FaMicrophoneAlt } from "react-icons/fa";
import { MdLibraryMusic, MdOutlineQueueMusic, MdAlbum } from "react-icons/md";

/* import AudioBar from "./AudioBar"; */

/* Contents */
import ArtistsPage from "../pages/ArtistsPage";
import SearchPage from "../pages/SearchPage";
import AlbumPage from "../pages/AlbumPage";
import GenderPage from "../pages/GenderPage";
import MusicPage from "../pages/MusicPage";
import NotFound from "../pages/NotFound";
import ArtistDetails from "../pages/ArtistDetails";
import AlbumDetails from "../pages/AlbumDetails";
import Home from "../pages/Home";

const MainContainer = () => {
  const menuList = [
    {
      id: 1,
      icon: <BsFillHouseFill />,
      name: "Accueil",
      href: "/",
      content: <Home />,
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

  return (
    <div className="mainContainer">
      <Routes>
        {menuList &&
          menuList.map((menu) => (
            <Route path={menu.href} key={menu.id} element={menu.content} />
          ))}
        <Route path={"/albums/:id"} element={<AlbumDetails />} />
        <Route path={"/artistes/:id"} element={<ArtistDetails />} />
        <Route path="*" element={<NotFound />} />
      </Routes>

      {/* <AudioBar /> */}
    </div>
  );
};

export default MainContainer;
