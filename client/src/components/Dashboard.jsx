import React, { useState } from "react";
import {
  Box,
  Button,
  Container,
  Divider,
  Flex,
  Grid,
  Group,
  Image,
  Paper,
  SimpleGrid,
  Space,
  Stack,
  Text,
  TextInput,
  Textarea,
} from "@mantine/core";
import Calendar from "react-calendar";
import "react-calendar/dist/Calendar.css";
import ex1 from "../assets/admin1.png";
import ex2 from "../assets/admin2.png";
import Tables from "./Table";

function Dashboard() {
  const [date, setDate] = useState(new Date());

  const onChange = (newDate) => {
    setDate(newDate);
  };
  return (
    <div>
      <Grid columns={26}>
        <Grid.Col span={11}>
          <SimpleGrid cols={1} h="100%">
            <Box>
              <Paper h="100%" p="lg" shadow="xl" withBorder>
                <Stack>
                  <Text fw={700}>Quick Draft</Text>
                  <TextInput placeholder="Title" />
                  <Textarea placeholder="What's on your mind?" />
                  <Button color="#EFBF22">Save Draft</Button>
                </Stack>
              </Paper>
            </Box>
            <Box h="100%">
              <Paper p="lg" h="100%" shadow="xl" withBorder>
                <Text fw={700}>News</Text>
                <Divider />
                <Space h="md" />
                <Stack gap="sm">
                  <Flex justify="space-between">
                    <Text size="xs">
                      Congratulations to the new PLMayer Chem...
                    </Text>
                    <Text size="xs" c="dimmed">
                      23 OCTOBER 2023
                    </Text>
                  </Flex>
                  <Divider />
                  <Flex justify="space-between">
                    <Text size="xs">
                      President Leyco retires from PLM effective Oct. 15
                    </Text>
                    <Text size="xs" c="dimmed">
                      13 OCTOBER 2023
                    </Text>
                  </Flex>
                  <Divider />
                  <Flex justify="space-between">
                    <Text size="xs">
                      PLM is Top 4 in July 2023 licensure exam for master ...
                    </Text>
                    <Text size="xs" c="dimmed">
                      19 JULY 2023
                    </Text>
                  </Flex>
                  <Divider />
                  <Flex justify="space-between">
                    <Text size="xs">
                      3 CPT grads among topnotchers in June 2023 physical.....
                    </Text>
                    <Text size="xs" c="dimmed">
                      21 JUNE 2023
                    </Text>
                  </Flex>
                </Stack>
              </Paper>
            </Box>
          </SimpleGrid>
        </Grid.Col>
        <Grid.Col span={7}>
          <SimpleGrid cols={1} h="100%">
            <Box>
              <Paper p="lg" h="100%" shadow="xl" withBorder>
                <Text fw={700}>Activity</Text>
                <Space h="sm" />
                <Divider />
                <Space h="sm" />
                <Text fw={700}>Recently Published</Text>
                <Space h="sm" />
                <Divider />
                <Space h="sm" />
                <Group>
                  <Text size="xs" c="#006699">
                    All (0)
                  </Text>
                  <Text size="xs" c="#006699">
                    Draft (0)
                  </Text>
                  <Text size="xs" c="#006699">
                    Published (0)
                  </Text>
                  <Text size="xs" c="#006699">
                    Trash (0)
                  </Text>
                  <Text size="xs" c="#006699">
                    Pending (0)
                  </Text>
                </Group>
              </Paper>
            </Box>
            <Box>
              <Paper p="lg" h="100%" shadow="xl" withBorder>
                <Text fw={700}>Event Calendar</Text>
                <Space h="sm" />
                <Divider />
                <Space h="sm" />
                <Container>
                  <Calendar onChange={onChange} value={date} />
                </Container>
              </Paper>
            </Box>
          </SimpleGrid>
        </Grid.Col>
        <Grid.Col span={8}>
          <SimpleGrid cols={1} h="100%">
            <Box>
              <Paper p="lg" h="100%" shadow="xl" withBorder>
                <Text fw={700}>Upcoming Events</Text>
                <Space h="sm" />
                <Divider />
                <Space h="sm" />
                <Flex justify="space-between">
                  <Image maw={200} src={ex1} />
                  <Stack>
                    <Text size="md">Example event 3</Text>
                    <Text size="xs" c="dimmed">
                      7:30 am to 12:00 nn
                    </Text>
                  </Stack>
                </Flex>
                <Space h="sm" />
                <Flex justify="space-between">
                  <Image maw={200} src={ex2} />
                  <Stack>
                    <Text size="md">Example event 3</Text>
                    <Text size="xs" c="dimmed">
                      7:30 am to 12:00 nn
                    </Text>
                  </Stack>
                </Flex>
                <Space h="sm" />
                <Flex justify="space-between">
                  <Image maw={200} src={ex1} />
                  <Stack>
                    <Text size="md">Example event 3</Text>
                    <Text size="xs" c="dimmed">
                      7:30 am to 12:00 nn
                    </Text>
                  </Stack>
                </Flex>
              </Paper>
            </Box>
            <Box>
              <Paper p="lg" h="100%" shadow="xl" withBorder>
                <Text fw={700}>Logs</Text>
                <Space h="sm" />
                <Divider />
                <Tables />
              </Paper>
            </Box>
          </SimpleGrid>
        </Grid.Col>
      </Grid>
    </div>
  );
}

export default Dashboard;
