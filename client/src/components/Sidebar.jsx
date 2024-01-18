import React from "react";
import { ScrollArea, Stack, Text } from "@mantine/core";
import {
  IconNotes,
  IconGauge,
  IconPin,
  IconActivity,
} from "@tabler/icons-react";

import LinksGroup from "./LinksGroup";
import classes from "../styles/Sidebar.module.css";
import { IconSettings2 } from "@tabler/icons-react";
import Logo from "./Logo";

const mockdata = [
  { label: "Dashboard", icon: IconGauge },
  {
    label: "Posts",
    icon: IconPin,
    initiallyOpened: true,
    links: [
      { label: "Archive", link: "/" },
      { label: "Recently Posts", link: "/" },
    ],
  },
  {
    label: "Activity",
    icon: IconActivity,
    links: [
      { label: "Upcoming releases", link: "/" },
      { label: "Previous releases", link: "/" },
      { label: "Releases schedule", link: "/" },
    ],
  },
  { label: "Accoung Management", icon: IconSettings2 },
  { label: "Logs", icon: IconNotes },
];

function Sidebar() {
  const links = mockdata.map((item) => (
    <LinksGroup {...item} key={item.label} />
  ));

  return (
    <nav className={classes.navbar}>
      <div className={classes.header}>
        <Stack>
          <div style={{ position: "relative" }}>
            <Logo />
          </div>
          <Text fw={700} size="2rem" p="xs" c="#EFBF22">
            CMS
          </Text>
        </Stack>
      </div>
      <Text p="xs" fw={500} style={{ marginBottom: "-2rem" }}>
        Menu
      </Text>
      <ScrollArea className={classes.links}>
        <div className={classes.linksInner}>{links}</div>
      </ScrollArea>
    </nav>
  );
}

export default Sidebar;
