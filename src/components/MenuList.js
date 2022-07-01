import { BsFillHouseFill } from "react-icons/bs";
import { FaMicrophoneAlt } from "react-icons/fa";
import { MdLibraryMusic, MdOutlineQueueMusic, MdAlbum } from "react-icons/md";

/* Contents */
import ArtistsPage from "../pages/ArtistsPage";
import AlbumPage from "../pages/AlbumPage";
import GenderPage from "../pages/GenderPage";
import MusicPage from "../pages/MusicPage";

const MenuList = [
  {
    id: 1,
    icon: <BsFillHouseFill />,
    name: "Accueil",
    href: "/",
    content: <AlbumPage />,
  },
  {
    id: 2,
    icon: <MdOutlineQueueMusic />,
    name: "Musique",
    href: "/musique",
    content: <MusicPage />,
  },
  {
    id: 3,
    icon: <MdLibraryMusic />,
    name: "Genre",
    href: "/genre",
    content: <GenderPage />,
  },
  {
    id: 4,
    icon: <MdAlbum />,
    name: "Album",
    href: "/album",
    content: <AlbumPage />,
  },
  {
    id: 5,
    icon: <FaMicrophoneAlt />,
    name: "Artistes",
    href: "/artiste",
    content: <ArtistsPage />,
  },
];

export { MenuList };
