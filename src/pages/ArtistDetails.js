import { Card } from "@mui/material";
import "../styles/pages/ArtistDetails.scss";
import React, { useEffect, useState } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

const ArtistDetails = () => {
  let { id } = useParams();
  const [data, setData] = useState();
  const getData = async () => {
    const res = await axios.get(`http://localhost:3001/api/artists/${id}`);
    const data = res.data.data;
    const postData = [data].map((artist) => (
      <div key={artist.id}>
        <div className="dWrap detailsContainer">
          <Card className="default headerDetails">
            <img src={artist.photo} alt={artist.name} className="coverLg" />
            <div className="textContent">
              <h2 className="titleHolder">ARTISTE : {artist.name}</h2>
              <p className="titleDescription">
                <span>Description :</span> {artist.description}
              </p>
              <p className="titleBio">
                <span>Bio :</span> {artist.bio}
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

export default ArtistDetails;
