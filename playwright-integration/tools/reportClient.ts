import axios from 'axios';
export async function sendReport(projectSlug:string,payload:any,apiToken?:string){
  const url=(process.env.DASH_URL||'http://localhost:8000')+'/api/projects/'+projectSlug+'/runs';
  const headers:any={'Content-Type':'application/json'}; if(apiToken) headers['Authorization']='Bearer '+apiToken;
  return axios.post(url,payload,{headers}).then(r=>r.data);
}
