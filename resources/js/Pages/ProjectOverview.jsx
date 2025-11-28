import React from 'react';
export default function ProjectOverview({project, analytics}){
  return (<div><h1>{project?.name || 'Project'}</h1></div>);
}