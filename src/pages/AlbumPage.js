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

const AlbumPage = () => {
  const [data, setData] = useState([]);

  const getData = async () => {
    const res = await axios.get("http://localhost:3001/api/albums");
    const data = res.data.data;
    const postData = data.map((album) => (
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
  };

  useEffect(() => {
    getData();
  }, []);

  return (
    <div>
      <div className="displayWrap">{data}</div>
    </div>
  );
};

export default AlbumPage;
