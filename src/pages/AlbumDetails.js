import { Card } from "@mui/material";
import "../styles/pages/ArtistDetails.scss";
import React, { useEffect, useState } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

const AlbumDetails = () => {
  let { id } = useParams();
  const [data, setData] = useState();
  const getData = async () => {
    const res = await axios.get(`http://localhost:3001/api/albums/${id}`);
    const data = res.data.data;
    const postData = [data].map((album) => (
      <div key={album.id}>
        <div className="dWrap detailsContainer">
          <Card className="default headerDetails">
            <img src={album.cover_small} alt={album.name} className="coverLg" />
            <div className="textContent">
              <h2 className="titleHolder">ALBUM : {album.name}</h2>
              <p className="titleDescription">
                <span>Description :</span> {album.description}
              </p>
              <p className="titleBio">
                <span>Popularité :</span> {album.popularity}
              </p>
            </div>
          </Card>
        </div>
      </div>
    ));
    setData(postData);
  };

  useEffect(() => {
    getData();
  }, []);

  return (
    <div>
      <div className="displayWrapDetails">{data}</div>
    </div>
  );
};

export default AlbumDetails;
