import React, { useState, useEffect } from "react";
import axios from "axios";
import {
  Text,
  Group,
  Image,
  Button,
  Container,
  TextInput,
  Grid,
  Flex,
  Space,
} from "@mantine/core";
import { useNavigate } from "react-router-dom";
import logo from "../assets/PLMLogo.png";

axios
  .get("serverappHttpControllersAuthController")
  .then((response) => {
    // Handle the response
    console.log(response.data);
    // You can do more with the data here
  })
  .catch((error) => {
    // Handle errors
    console.error("There was an error with the request:", error);
  });

function Login() {
  const [currentDateTime, setCurrentDateTime] = useState("");
  const navigate = useNavigate();

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
    <div className="main-container">
      <nav className="header">
        <Flex direction="column" p="3rem">
          <Text c="#D5A106" fw={500}>
            PAMANTASAN NG LUNGSOD NG MAYNILA
          </Text>
          <Text c="dimmed" fw={500}>
            UNIVERSITY OF THE CITY OF MANILA
          </Text>
        </Flex>
        <Flex direction="column" p="3rem">
          <Text ta="right" size="2rem" fw="bold" c="#D5A106">
            CMS
          </Text>
          <Text c="dimmed">{`Today is ${currentDateTime}`}</Text>
        </Flex>
      </nav>
      <Grid h="70vh">
        <Grid.Col span={6} className="login-container">
          <div>
            <Flex direction="column">
              <Text ta="left" size="1.5rem" fw={700}>
                LOG IN
              </Text>
              <Text size="lg">Welcome back, Please log In to your account</Text>
              <Space h="md" />

              <TextInput
                size="lg"
                label={
                  <Text c="dimmed" fw={500}>
                    Email
                  </Text>
                }
              />

              <Space h="md" />
              <TextInput
                type="password"
                size="lg"
                label={
                  <Text c="dimmed" fw={500}>
                    Password
                  </Text>
                }
              />
            </Flex>
            <Space h="md" />
            <Flex direction="column">
              <Button
                size="lg"
                fullWidth
                color="#EFBF22"
                onClick={() => navigate("/admin")}
              >
                <Text fw={700}>Login</Text>
              </Button>
              <Space h="md" />
              <Button fullWidth color="#006699" size="lg">
                <a href="{{ route('connect') }}">
                  <Text c="white" fw={700}>
                    Login with your Microsoft Account
                  </Text>
                </a>
              </Button>
            </Flex>
          </div>
        </Grid.Col>
        <Grid.Col span={6} className="logo-container">
          <Container>
            <Image maw={450} src={logo} />
          </Container>
        </Grid.Col>
      </Grid>
      <div className="footer">
        <Group gap="xl">
          <Text c="dimmed" size="sm">
            © 1967 - 2023 Pamantasan ng Lungsod ng Maynila. All Rights Reserved.
          </Text>
          <Text c="dimmed" size="sm" className="text">
            Terms & Conditions
          </Text>
          <Text c="dimmed" size="sm" className="text">
            Privacy Policy
          </Text>
        </Group>
      </div>
    </div>
  );
}

export default Login;
