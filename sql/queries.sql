use fone;

/* show race data */
select
 race_id,
 drivers.name as 'Name',
 countries.name as 'Country',
 teams.name as 'Team',
 season_id as 'Season'
from
races
left join drivers on races.driver_id = drivers.driver_id
left join countries on races.country_id = countries.country_id
left join teams on races.team_id = teams.team_id;
