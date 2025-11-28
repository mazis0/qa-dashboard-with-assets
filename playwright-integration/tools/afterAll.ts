import { parseCucumberJson } from './parseCucumber';
import { sendReport } from './reportClient';
(async ()=>{
  const { scenarios } = parseCucumberJson(process.env.CUCUMBER_REPORT||'cucumber-report.json');
  const payload={ external_id:process.env.CI_BUILD_ID||null, status: scenarios.some(s=>s.status==='failed') ? 'failed':'passed', started_at:new Date().toISOString(), finished_at:new Date().toISOString(), total:scenarios.length, passed:scenarios.filter(s=>s.status==='passed').length, failed:scenarios.filter(s=>s.status==='failed').length, scenarios };
  console.log('Sending',payload);
  await sendReport(process.env.DASH_PROJECT||'my-project', payload, process.env.DASH_API_TOKEN);
})();
