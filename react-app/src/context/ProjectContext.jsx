import { createContext, useState } from "react";
import apiRoutes from "../utils/api";
import axios from "axios";

export const projectContext = createContext();

const ProjectProvider = ({ children }) => {
  const [projects, setProjects] = useState([]);

  const getProjects = async () => {
    const apiUrl = apiRoutes.getProjects;
    console.log(apiUrl);
    const response = await axios.request({
      method: "GET",
      url: apiUrl,
    });

    setProjects(response.data.projects);
  };
  return (
    <projectContext.Provider
      value={{
        projects,
        getProjects,
      }}
    >
      {children}
    </projectContext.Provider>
  );
};

export default ProjectProvider;
