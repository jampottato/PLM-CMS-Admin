import React, { useState, useEffect } from "react";
import {
  AppShell,
  Burger,
  Group,
  ActionIcon,
  Text,
  TextInput,
  rem,
  Space,
  Flex,
} from "@mantine/core";
import { useDisclosure } from "@mantine/hooks";
import { IconBell, IconSearch, IconUserCircle } from "@tabler/icons-react";
import Sidebar from "../components/Sidebar";
import Dashboard from "../components/Dashboard";

export function Admin() {
  const [opened, { toggle }] = useDisclosure();
  const icon = <IconSearch style={{ width: rem(16), height: rem(16) }} />;
  const [currentDateTime, setCurrentDateTime] = useState("");

  useEffect(() => {
    // Function to update current date and time
    const updateDateTime = () => {
      const now = new Date();
      const options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
      };
      const formattedDateTime = now.toLocaleString("en-US", options); // Adjust formatting as needed
      setCurrentDateTime(formattedDateTime);
    };

    // Update current date and time initially and set up interval for real-time updates
    updateDateTime();
    const intervalId = setInterval(updateDateTime, 1000); // Update every second

    // Clear interval when component unmounts
    return () => clearInterval(intervalId);
  }, []);
  return (
    <AppShell
      style={{ backgroundColor: "#efefef" }}
      layout="alt"
      header={{ height: 75 }}
      footer={{ height: 50 }}
      navbar={{ width: 300, breakpoint: "sm", collapsed: { mobile: !opened } }}
    >
      <AppShell.Header style={{ backgroundColor: "#efefef" }}>
        <Group h="100%" px="md" justify="space-between">
          <Burger opened={opened} onClick={toggle} hiddenFrom="sm" size="sm" />
          <TextInput leftSection={icon} placeholder="Search" />
          <Group>
            <ActionIcon variant="subtle" color="black">
              <IconBell
                style={{ width: "100%", height: "100%" }}
                stroke={1.5}
              />
            </ActionIcon>
            <ActionIcon variant="subtle" color="black">
              <IconUserCircle
                style={{ width: "100%", height: "100%" }}
                stroke={1.5}
              />
            </ActionIcon>
          </Group>
        </Group>
      </AppShell.Header>
      <AppShell.Navbar>
        <Sidebar />
      </AppShell.Navbar>
      <AppShell.Main>
        <div style={{ margin: "auto", padding: "1rem", height: "100%" }}>
          <Flex justify="space-between">
            <Text fw={700} size="lg">
              DASHBOARD
            </Text>
            <Text c="dimmed">{`Today is ${currentDateTime}`}</Text>
          </Flex>
          <Space h="xl" />
          <Dashboard />
        </div>
      </AppShell.Main>
      <AppShell.Footer
        style={{
          backgroundColor: "#efefef",
          display: "flex",
          alignItems: "center",
          padding: "1rem",
        }}
      >
        <Text c="dimmed" size="sm">
          © 1967 - 2023 Pamantasan ng Lungsod ng Maynila. All Rights Reserved.
        </Text>
      </AppShell.Footer>
    </AppShell>
  );
}

export default Admin;
