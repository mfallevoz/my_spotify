import React from "react";
import MainContainer from "./components/MainContainer";
import LeftMenu from "./components/LeftMenu";
import RightMenu from "./components/RightMenu";

const App = () => {
  return (
    <div className="App">
      <LeftMenu />
      <MainContainer />
      <RightMenu />
      <div className="background"></div>
    </div>
  );
};

export default App;
