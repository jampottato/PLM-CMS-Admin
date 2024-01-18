import React from "react";
import { Image } from "@mantine/core";
import logo from "../assets/PLMLogo.png";

function Logo() {
  return (
    <div>
      <Image maw={60} src={logo} />
    </div>
  );
}

export default Logo;
