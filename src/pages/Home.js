import {
  Card,
  CardContent,
  CardMedia,
  IconButton,
  ListItem,
  Typography,
} from "@mui/material";
import React, { useEffect, useState } from "react";
import axios from "axios";
import "../styles/pages/ArtistsPage.scss";
import { BsFillPlayFill } from "react-icons/bs";
import { Link } from "react-router-dom";

const Home = () => {
  const [data, setData] = useState([]);
  const [offset] = useState(0);
  const [perPage] = useState(1625);
  const [setPageCount] = useState(0);

  const getData = async () => {
    const res = await axios.get("http://localhost:3001/api/albums");
    const data = res.data.data;
    shuffleArray(data);
    const slice = data.slice(offset, offset + perPage);
    const postData = slice.map((album) => (
      <Link className="tab" to={"/albums/" + album.id} key={album.name}>
        <Card className="root" key={album.id}>
          <ListItem className="colDirection">
            <div className="details">
              <CardContent className="content">
                <Typography className="textHide">{album.name}</Typography>
              </CardContent>
              <div className="controls">
                <IconButton aria-label="play/pause">
                  <BsFillPlayFill className="playIcon" />
                </IconButton>
              </div>
            </div>
            <CardMedia
              className="cover"
              image={album.cover}
              title={album.description}
            />
          </ListItem>
        </Card>
      </Link>
    ));
    setData(postData);
    setPageCount(Math.ceil(data.length / perPage));
  };

  useEffect(() => {
    getData();
  }, [offset]);

  return (
    <div>
      <div className="displayWrap">{data}</div>
    </div>
  );
};

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    const temp = array[i];
    array[i] = array[j];
    array[j] = temp;
  }
}


export default Home;
