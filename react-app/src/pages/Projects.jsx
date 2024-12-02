import React, { useContext, useState, useEffect } from "react";
import Project from "../components/Project";
import { projectContext } from "../context/ProjectContext";
const Projects = () => {
  const { projects, getProjects } = useContext(projectContext);

  useEffect(() => {
    getProjects();
  }, []);
  return (
    <div className="projects-container">
      {projects.map((p) => (
        <Project project={p} key={p.id} />
      ))}
    </div>
  );
};

export default Projects;
