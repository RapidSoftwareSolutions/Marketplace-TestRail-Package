[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/TestRail/functions?utm_source=RapidAPIGitHub_TestRailFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# TestRail Package
TestRail helps you manage and track your software testing efforts and organize your QA department. Its intuitive web-based user interface makes it easy to create test cases, manage test runs and coordinate your entire testing process.
* Domain: [www.gurock.com](http://www.gurock.com/testrail/)
* Credentials: apiKey, appName, username

## How to get credentials: 
0. Register on the [www.gurock.com](http://www.gurock.com/testrail/)
1. After registration, create api key in account settings
2. After creation api key,API can be enabled in the administration area in TestRail under Administration > Site Settings > API
3. You can get appName from url.For example rapidtest from url - `https:\/\/rapidtest.testrail.io`

## Custom datatypes: 
 |Datatype|Description|Example
 |--------|-----------|----------
 |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
 |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
 |List|Simple array|```["123", "sample"]``` 
 |Select|String with predefined values|```sample```
 |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ``` 
 
## TestRail.getCase
Use the following API method to request details about test case.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| caseId  | Number     | The ID of the test case.

## TestRail.getCases
Returns a list of test cases for a test suite or specific section in a test suite.

| Field        | Type       | Description
|--------------|------------|----------
| appName      | credentials| Your app name. Example - rapidtest
| username     | credentials| Your username.
| apiKey       | credentials| Your API Key.Also you can use account password.
| projectId    | Number     | The ID of the project.
| suiteId      | Number     | The ID of the test suite (optional if the project is operating in single suite mode).
| sectionId    | Number     | The ID of the section (optional).
| createdAfter | DatePicker | Only return test cases created after this date.
| createdBefore| DatePicker | Only return test cases created before this date.
| createdBy    | List       | List of creators (user IDs) to filter by.
| milestoneId  | List       | List of milestone IDs to filter by (not available if the milestone field is disabled for the project).
| priorityId   | List       | List of priority IDs to filter by.
| typeId       | List       | List of case type IDs to filter by.
| templateId   | List       | List of template IDs to filter by.(requires TestRail 5.2 or later)
| updatedAfter | DatePicker | Only return test cases updated after this date.
| updatedBefore| DatePicker | Only return test cases updated before this date.
| updatedBy    | List       | List of users who updated test cases to filter by.

## TestRail.createCase
Creates a new test case.

| Field       | Type       | Description
|-------------|------------|----------
| appName     | credentials| Your app name. Example - rapidtest
| username    | credentials| Your username.
| apiKey      | credentials| Your API Key.Also you can use account password.
| sectionId   | Number     | The ID of the section the test case should be added to.
| title       | String     | The title of the test case (required)
| templateId  | Number     | The ID of the template (field layout) (requires TestRail 5.2 or later).
| typeId      | Number     | The ID of the case type.
| estimate    | String     | The estimate, e.g. `30s` or `1m 45s`.
| priorityId  | Number     | The ID of the case priority.
| milestoneId | Number     | The ID of the milestone to link to the test case.
| refs        | List       | List of references/requirements.
| customFields| Array      | Custom fields are supported as well and must be submitted with their system name, prefixed with 'custom_'.

##### customField example

```
{
	"custom_preconds": "These are the preconditions for a test case"
}
```

```
	"custom_steps_separated": [
		{
			"content": "Step 1",
			"expected": "Expected Result 1"
		},
		{
			"content": "Step 2",
			"expected": "Expected Result 2"
		}
	]
```


## TestRail.updateCase
Updates an existing test case (partial updates are supported, i.e. you can submit and update specific fields only).

| Field       | Type       | Description
|-------------|------------|----------
| appName     | credentials| Your app name. Example - rapidtest
| username    | credentials| Your username.
| apiKey      | credentials| Your API Key.Also you can use account password.
| caseId      | Number     | The ID of the test case
| title       | String     | The title of the test case (required)
| templateId  | Number     | The ID of the template (field layout) (requires TestRail 5.2 or later).
| typeId      | Number     | The ID of the case type.
| estimate    | String     | The estimate, e.g. `30s` or `1m 45s`.
| priorityId  | Number     | The ID of the case priority.
| milestoneId | Number     | The ID of the milestone to link to the test case.
| refs        | List       | List of references/requirements.
| customFields| Array      | Custom fields are supported as well and must be submitted with their system name, prefixed with 'custom_'.

##### customFields example

```
	"custom_preconds": "These are the preconditions for a test case"
```

```
	"custom_steps_separated": [
		{
			"content": "Step 1",
			"expected": "Expected Result 1"
		},
		{
			"content": "Step 2",
			"expected": "Expected Result 2"
		}
	]
```

## TestRail.deleteCase
Deletes an existing test case.Please note: Deleting a test case cannot be undone and also permanently deletes all test results in active test runs (i.e. test runs that haven't been closed (archived) yet).

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| caseId  | Number     | The ID of the test case.

## TestRail.getAllCaseFields
Returns a list of available test case custom fields.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.

## TestRail.getAllCaseTypes
Returns a list of available case types.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.

## TestRail.getProjectConfigs
Returns a list of available configurations, grouped by configuration groups (requires TestRail 3.1 or later).

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| projectId| Number     | The ID of the project.

## TestRail.createNewConfigurationGroup
Creates a new configuration group (requires TestRail 5.2 or later).

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| projectId| Number     | The ID of the project the configuration group should be added to.
| name     | String     | The name of the configuration group (required).

## TestRail.createNewConfiguration
Creates a new configuration (requires TestRail 5.2 or later).

| Field        | Type       | Description
|--------------|------------|----------
| appName      | credentials| Your app name. Example - rapidtest
| username     | credentials| Your username.
| apiKey       | credentials| Your API Key.Also you can use account password.
| configGroupId| Number     | The ID of the configuration group the configuration should be added to.
| name         | String     | The name of the configuration (required).

## TestRail.updateConfig
Updates an existing configuration (requires TestRail 5.2 or later).

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| configId| Number     | The ID of the configuration.
| name    | String     | The name of the configuration.

## TestRail.deleteConfigGroup
Deletes an existing configuration group and its configurations (requires TestRail 5.2 or later).Please note: Deleting a configuration group cannot be undone and also permanently deletes all configurations in this group. It does not, however, affect closed test plans/runs, or active test plans/runs unless they are updated.

| Field        | Type       | Description
|--------------|------------|----------
| appName      | credentials| Your app name. Example - rapidtest
| username     | credentials| Your username.
| apiKey       | credentials| Your API Key.Also you can use account password.
| configGroupId| Number     | The ID of the configuration group.

## TestRail.deleteConfig
Deletes an existing configuration (requires TestRail 5.2 or later).Please note: Deleting a configuration cannot be undone. It does not, however, affect closed test plans/runs, or active test plans/runs unless they are updated.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| configId| Number     | The ID of the configuration.

## TestRail.getMilestone
Returns an existing milestone.

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| milestoneId| Number     | The ID of the milestone.

## TestRail.getMilestones
Returns the list of milestones for a project.

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| projectId  | Number     | The ID of the project.
| isCompleted| Select     | 1 to return completed milestones only. 0 to return open (active/upcoming) milestones only (available since TestRail 4.0).
| isStarted  | Select     | 1 to return started milestones only. 0 to return upcoming milestones only (available since TestRail 5.3).

## TestRail.createsMilestone
Creates a new milestone.

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| projectId  | Number     | The ID of the project the milestone should be added to.
| name       | String     | The name of the milestone (required).
| description| String     | The description of the milestone.
| dueOn      | DatePicker | The due date of the milestone.
| parentId   | String     | The ID of the parent milestone, if any (for sub-milestones) (available since TestRail 5.3).
| startOn    | String     | The scheduled start date of the milestone.

## TestRail.updateMilestone
Updates an existing milestone (partial updates are supported, i.e. you can submit and update specific fields only).

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| milestoneId| Number     | The ID of the milestone.
| isCompleted| Select     | True if a milestone is considered completed and false otherwise.
| isStarted  | Select     | True if a milestone is considered started and false otherwise.
| parentId   | String     | The ID of the parent milestone, if any (for sub-milestones) (available since TestRail 5.3).
| startOn    | String     | The scheduled start date of the milestone.

## TestRail.deleteMilestone
Deletes an existing milestone.Please note: Deleting a milestone cannot be undone.

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| milestoneId| Number     | The ID of the milestone.

## TestRail.getPlan
Returns an existing test plan.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| planId  | Number     | The ID of the test plan.

## TestRail.getPlans
Returns a list of test plans for a project.

| Field        | Type       | Description
|--------------|------------|----------
| appName      | credentials| Your app name. Example - rapidtest
| username     | credentials| Your username.
| apiKey       | credentials| Your API Key.Also you can use account password.
| projectId    | Number     | The ID of the project.
| createdAfter | DatePicker | Only return test plans created after this date.
| createdBefore| DatePicker | Only return test plans created before this date.
| createdBy    | List       | List of creators (user IDs) to filter by.
| isCompleted  | Select     | 1 to return completed test plans only. 0 to return active test plans only.
| limit        | Number     | Limit the result to :limit test plans.
| offset       | Number     | Use :offset to skip records.
| milestoneId  | List       | List of milestone IDs to filter by.

## TestRail.createPlan
Creates a new test plan.

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| projectId  | Number     | The ID of the project the test plan should be added to.
| name       | String     | The name of the test plan (required).
| description| String     | The description of the test plan.
| milestoneId| String     | The ID of the milestone to link to the test plan.
| entries    | JSON       | An json array of objects describing the test runs of the plan.

##### entries example

```
	"entries": [
		{ 
			"suite_id": 1,
			"name": "Custom run name",
			"assignedto_id": 1 // ID of the assignee
		},
		{ 
			"suite_id": 1,
			"include_all": false, // Custom selection
			"case_ids": [1,2,3,5]
		}
	]
```

 Starting with TestRail 3.1, add_plan also supports configurations:
 
 ```
 "entries": [
 		{
 			"suite_id": 1,
 			"include_all": true,
 			"config_ids": [1, 2, 4, 5, 6],
 			"runs": [
 				{
 					"include_all": false,
 					"case_ids": [1, 2, 3],
 					"assignedto_id": 1,
 					"config_ids": [2, 5]
 				},
 				{
 					"include_all": false,
 					"case_ids": [1, 2, 3, 5, 8],
 					"assignedto_id": 2,
 					"config_ids": [2, 6]
 				}
 
 				..
 			]
 		}
 	]
 ```
 
 This will effectively create several test runs per test plan entry, similar to how you can manage test plans and configurations with TestRail's user interface. Please refer [below](http://docs.gurock.com/testrail-api2/reference-plans#add_plan_entry) for additional details.
 

## TestRail.createPlanEntry
Adds one or more new test runs to a test plan.

| Field       | Type       | Description
|-------------|------------|----------
| appName     | credentials| Your app name. Example - rapidtest
| username    | credentials| Your username.
| apiKey      | credentials| Your API Key.Also you can use account password.
| planId      | Number     | The ID of the project the test plan should be added to.
| suitId      | Number     | The ID of the test suite for the test run(s).
| name        | String     | The name of the test run (required).
| description | String     | The description of the test run(s) (requires TestRail 5.2 or later).
| assignedtoId| Number     | The ID of the user the test run(s) should be assigned to.
| includeAll  | Select     | True for including all test cases of the test suite and false for a custom case selection (default: true).
| caseIds     | List       | An array of case IDs for the custom case selection.
| configIds   | List       | An array of configuration IDs used for the test runs of the test plan entry (requires TestRail 3.1 or later).
| runs        | JSON       | An array of configuration IDs used for the test runs of the test plan entry (requires TestRail 3.1 or later).

##### entries example

```
	"entries": [
		{ 
			"suite_id": 1,
			"name": "Custom run name",
			"assignedto_id": 1 // ID of the assignee
		},
		{ 
			"suite_id": 1,
			"include_all": false, // Custom selection
			"case_ids": [1,2,3,5]
		}
	]
```

 Starting with TestRail 3.1, add_plan also supports configurations:
 
 ```
 "entries": [
 		{
 			"suite_id": 1,
 			"include_all": true,
 			"config_ids": [1, 2, 4, 5, 6],
 			"runs": [
 				{
 					"include_all": false,
 					"case_ids": [1, 2, 3],
 					"assignedto_id": 1,
 					"config_ids": [2, 5]
 				},
 				{
 					"include_all": false,
 					"case_ids": [1, 2, 3, 5, 8],
 					"assignedto_id": 2,
 					"config_ids": [2, 6]
 				}
 
 				..
 			]
 		}
 	]
 ```
 
 This will effectively create several test runs per test plan entry, similar to how you can manage test plans and configurations with TestRail's user interface. Please refer [below](http://docs.gurock.com/testrail-api2/reference-plans#add_plan_entry) for additional details.
 

## TestRail.updatePlan
Updates an existing test plan (partial updates are supported, i.e. you can submit and update specific fields only).

| Field       | Type       | Description
|-------------|------------|----------
| appName     | credentials| Your app name. Example - rapidtest
| username    | credentials| Your username.
| apiKey      | credentials| Your API Key.Also you can use account password.
| planId      | Number     | The ID of the project the test plan should be added to.
| name        | String     | The name of the test run (required).
| description | String     | The description of the test run(s) (requires TestRail 5.2 or later).

##### entries example

```
	"entries": [
		{ 
			"suite_id": 1,
			"name": "Custom run name",
			"assignedto_id": 1 // ID of the assignee
		},
		{ 
			"suite_id": 1,
			"include_all": false, // Custom selection
			"case_ids": [1,2,3,5]
		}
	]
```

 Starting with TestRail 3.1, add_plan also supports configurations:
 
 ```
 "entries": [
 		{
 			"suite_id": 1,
 			"include_all": true,
 			"config_ids": [1, 2, 4, 5, 6],
 			"runs": [
 				{
 					"include_all": false,
 					"case_ids": [1, 2, 3],
 					"assignedto_id": 1,
 					"config_ids": [2, 5]
 				},
 				{
 					"include_all": false,
 					"case_ids": [1, 2, 3, 5, 8],
 					"assignedto_id": 2,
 					"config_ids": [2, 6]
 				}
 
 				..
 			]
 		}
 	]
 ```
 
 This will effectively create several test runs per test plan entry, similar to how you can manage test plans and configurations with TestRail's user interface. Please refer [below](http://docs.gurock.com/testrail-api2/reference-plans#add_plan_entry) for additional details.
 


## TestRail.updatePlanEntry
Updates one or more existing test runs in a plan (partial updates are supported, i.e. you can submit and update specific fields only).

| Field       | Type       | Description
|-------------|------------|----------
| appName     | credentials| Your app name. Example - rapidtest
| username    | credentials| Your username.
| apiKey      | credentials| Your API Key.Also you can use account password.
| planId      | Number     | The ID of the project the test plan should be added to.
| entryId     | String     | The ID of the test plan entry (note: not the test run ID)
| name        | String     | The name of the test run (required).
| description | String     | The description of the test run(s) (requires TestRail 5.2 or later).
| assignedtoId| Number     | The ID of the user the test run(s) should be assigned to.
| includeAll  | Select     | True for including all test cases of the test suite and false for a custom case selection (default: true)
| caseIds     | List       | An array of case IDs for the custom case selection.

## TestRail.closePlan
Closes an existing test plan and archives its test runs & results.Please note: Closing a test plan cannot be undone.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| planId  | Number     | The ID of the plan.

## TestRail.deletePlan
Deletes an existing test plan.Please note: Deleting a test plan cannot be undone and also permanently deletes all test runs & results of the test plan.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| planId  | Number     | The ID of the plan.

## TestRail.deletePlanEntry
Deletes one or more existing test runs from a plan.Please note: Deleting a test run from a plan cannot be undone and also permanently deletes all related test results.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| planId  | Number     | The ID of the plan.
| entryId | String     | The ID of the test plan entry (note: not the test run ID).

## TestRail.getAllPriorities
Returns a list of available priorities.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.

## TestRail.getProject
Returns an existing project.

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| projectId| String     | The ID of the project.

## TestRail.getProjects
Returns the list of available projects.

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| isCompleted| Select     | 1 to return completed projects only. 0 to return active projects only.

## TestRail.createProject
Creates a new project (admin status required).

| Field           | Type       | Description
|-----------------|------------|----------
| appName         | credentials| Your app name. Example - rapidtest
| username        | credentials| Your username.
| apiKey          | credentials| Your API Key.Also you can use account password.
| name            | String     | The name of the project (required).
| announcement    | String     | The description of the project.
| showAnnouncement| Select     | True if the announcement should be displayed on the project's overview page and false otherwise.
| suiteMode       | Number     | The suite mode of the project (1 for single suite mode, 2 for single suite + baselines, 3 for multiple suites) (added with TestRail 4.0).

## TestRail.updateProject
Updates an existing project (admin status required; partial updates are supported, i.e. you can submit and update specific fields only).

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| projectId  | Number     | The name of the project (required).
| isCompleted| Select     | Specifies whether a project is considered completed or not.

## TestRail.deleteProject
Deletes an existing project (admin status required).Please note: Deleting a project cannot be undone and also permanently deletes all test suites & cases, test runs & results and everything else that is part of the project.

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| projectId| String     | The ID of the project.

## TestRail.getResults
Returns a list of test results for a test.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| testId  | String     | The ID of the test.
| limit   | Number     | Limit the result to .
| offset  | Number     | Use :offset to skip records.
| statusId| List       | List of status IDs to filter by.

## TestRail.getResultsForCase
Returns a list of test results for a test run and case combination.

The difference to get_results is that this method expects a test run + test case instead of a test. In TestRail, tests are part of a test run and the test cases are part of the related test suite. So, when you create a new test run, TestRail creates a test for each test case found in the test suite of the run. You can therefore think of a test as an “instance” of a test case which can have test results, comments and a test status. Please also see TestRail's [getting started guide](http://docs.gurock.com/testrail-userguide/userguide-gettingstarted) for more details about the differences between test cases and tests.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| runId   | String     | The ID of the test run.
| caseId  | String     | The ID of the test case
| limit   | Number     | Limit the result to :limit test plans.
| offset  | Number     | Use :offset to skip records.
| statusId| List       | List of status IDs to filter by.

## TestRail.getResultsForRun
Returns a list of test results for a test run.Requires TestRail 4.0 or later.

| Field        | Type       | Description
|--------------|------------|----------
| appName      | credentials| Your app name. Example - rapidtest
| username     | credentials| Your username.
| apiKey       | credentials| Your API Key.Also you can use account password.
| runId        | String     | The ID of the test run.
| createdAfter | DatePicker | Only return test results created after this date.
| limit        | Number     | Limit the result to :limit test plans.
| offset       | Number     | Use :offset to skip records.
| statusId     | List       | List of status IDs to filter by.
| createdBefore| DatePicker | Only return test results created before this date.
| createdBy    | List       | List of creators (user IDs) to filter by.

## TestRail.addResults
Adds one or more new test results, comments or assigns one or more tests. Ideal for test automation to bulk-add multiple test results in one step.This method expects an array of test results (via the 'results' field, please see below). Each test result must specify the test ID and can pass in the same fields as add_result, namely all test related system and custom fields.Please note that all referenced tests must belong to the same test run.

| Field              | Type       | Description
|--------------------|------------|----------
| appName            | credentials| Your app name. Example - rapidtest
| username           | credentials| Your username.
| apiKey             | credentials| Your API Key.Also you can use account password.
| runId              | String     | The ID of the test run the results should be added to.
| resultJsonStructure| List       | List of the json results objects.

##### result example 
```
	    {
			"test_id": 101,
			"status_id": 5,
			"comment": "This test failed",
			"defects": "TR-7"
		}
```

See more [here](http://docs.gurock.com/testrail-api2/reference-results).

## TestRail.addResultsForCases
Adds one or more new test results, comments or assigns one or more tests (using the case IDs). Ideal for test automation to bulk-add multiple test results in one step.This method expects an array of test results (via the 'results' field, please see below). Each test result must specify the test case ID and can pass in the same fields as add_result, namely all test related system and custom fields. The difference to add_results is that this method expects test case IDs instead of test IDs. Please see addResultForCase for details. Please note that all referenced tests must belong to the same test run.

| Field              | Type       | Description
|--------------------|------------|----------
| appName            | credentials| Your app name. Example - rapidtest
| username           | credentials| Your username.
| apiKey             | credentials| Your API Key.Also you can use account password.
| runId              | String     | The ID of the test run the results should be added to.
| resultJsonStructure| List       | List of the json results objects.

##### structure example 

```
	    {
			"case_id": 1,
			"status_id": 5,
			"comment": "This test failed",
			"defects": "TR-7"
		}
```

See more [here](http://docs.gurock.com/testrail-api2/reference-results).

## TestRail.addResult
Adds a new test result, comment or assigns a test. It's recommended to use add_results instead if you plan to add results for multiple tests.

| Field       | Type       | Description
|-------------|------------|----------
| appName     | credentials| Your app name. Example - rapidtest
| username    | credentials| Your username.
| apiKey      | credentials| Your API Key.Also you can use account password.
| testId      | String     | The ID of the test.
| statusId    | Number     | You can get a full list of system and custom statuses via getStatuses.
| comment     | String     | The comment / description for the test result.
| version     | String     | The version or build you tested against.
| elapsed     | String     | The time it took to execute the test, e.g. `30s` or `1m 45s`
| defects     | List       | List of defects to link to the test result.
| assignedToId| String     | The ID of a user the test should be assigned to.
| customFields| Array      | Custom fields are supported as well and must be submitted with their system name, prefixed with 'custom_'.See more [here](http://docs.gurock.com/testrail-api2/reference-results#add_result).

## TestRail.addResultForCase
Adds a new test result, comment or assigns a test (for a test run and case combination). It's recommended to use add_results_for_cases instead if you plan to add results for multiple test cases.The difference to add_result is that this method expects a test run + test case instead of a test. In TestRail, tests are part of a test run and the test cases are part of the related test suite. So, when you create a new test run, TestRail creates a test for each test case found in the test suite of the run. You can therefore think of a test as an “instance” of a test case which can have test results, comments and a test status. Please also see TestRail's getting started guide for more details about the differences between test cases and tests.

| Field       | Type       | Description
|-------------|------------|----------
| appName     | credentials| Your app name. Example - rapidtest
| username    | credentials| Your username.
| apiKey      | credentials| Your API Key.Also you can use account password.
| runId       | String     | The ID of the test run.
| caseId      | String     | The ID of the case run.
| statusId    | Number     | You can get a full list of system and custom statuses via getStatuses.
| comment     | String     | The comment / description for the test result.
| version     | String     | The version or build you tested against.
| elapsed     | String     | The time it took to execute the test, e.g. `30s` or `1m 45s`
| defects     | List       | List of defects to link to the test result.
| assignedToId| String     | The ID of a user the test should be assigned to.
| customFields| List       | Custom fields are supported as well and must be submitted with their system name, prefixed with 'custom_'.See more [here](http://docs.gurock.com/testrail-api2/reference-results#add_result_for_case).

## TestRail.getResultFields
Returns a list of available test result custom fields.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.

## TestRail.getRun
Returns an existing test run. Please see getTests for the list of included tests in this run.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| runId   | String     | The ID of the test run.

## TestRail.createTestRun
Creates a new test run.

| Field       | Type       | Description
|-------------|------------|----------
| appName     | credentials| Your app name. Example - rapidtest
| username    | credentials| Your username.
| apiKey      | credentials| Your API Key.Also you can use account password.
| projectId   | Number     | The ID of the project.
| suiteId     | Number     | The ID of the test suite for the test run (optional if the project is operating in single suite mode, required otherwise).
| name        | String     | The name of the test run.
| description | String     | The description of the test run.
| milestoneId | String     | The ID of the milestone to link to the test run.
| assignedToId| Number     | The ID of the user the test run should be assigned to.
| includeAll  | Select     | True for including all test cases of the test suite and false for a custom case selection (default: true).
| caseIds     | List       | An array of case IDs for the custom case selection.

## TestRail.updateTestRun
Updates an existing test run (partial updates are supported, i.e. you can submit and update specific fields only).

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| runId      | Number     | The ID of the test run.
| name       | String     | The name of the test run.
| description| String     | The description of the test run.
| milestoneId| String     | The ID of the milestone to link to the test run.
| includeAll | Select     | True for including all test cases of the test suite and false for a custom case selection (default: true).
| caseIds    | List       | An array of case IDs for the custom case selection.

## TestRail.closeRun
Closes an existing test run and archives its tests & results.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| runId   | String     | The ID of the test run.

## TestRail.deleteRun
Deletes an existing test run.Please note: Deleting a test run cannot be undone and also permanently deletes all tests & results of the test run.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| runId   | String     | The ID of the test run.

## TestRail.getSection
Returns an existing section.

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| sectionId| String     | The ID of the section.

## TestRail.getSections
Returns a list of sections for a project and test suite.

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| projectId| String     | The ID of the project.
| suiteId  | String     | The ID of the test suite (optional if the project is operating in single suite mode).

## TestRail.createSection
Creates a new section.

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| projectId  | String     | The ID of the project.
| description| String     | The description of the section (added with TestRail 4.0).
| suiteId    | Number     | The ID of the test suite (ignored if the project is operating in single suite mode, required otherwise).
| parentId   | Number     | The ID of the parent section (to build section hierarchies).
| name       | String     | The name of the section (required).

## TestRail.updateSection
Updates an existing section (partial updates are supported, i.e. you can submit and update specific fields only).

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| sectionId  | String     | The ID of the section.
| description| String     | The description of the section (added with TestRail 4.0).
| name       | String     | The name of the section (required).

## TestRail.deleteSection
Deletes an existing section.Please note: Deleting a section cannot be undone and also deletes all related test cases as well as active tests & results, i.e. tests & results that weren't closed (archived) yet.

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| sectionId| String     | The ID of the section.

## TestRail.getStatuses
Returns a list of available test statuses.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.

## TestRail.getTestSuite
Returns an existing test suite.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| suiteId | String     | The ID of the test suite.

## TestRail.getTestSuitesForProject
Returns a list of test suites for a project.

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| projectId| String     | The ID of the project.

## TestRail.createTestSuite
Creates a new test suite.

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| projectId  | String     | The ID of the project the test suite should be added to.
| description| String     | The description of the test suite.
| name       | String     | The name of the test suite.

## TestRail.updateTestSuite
Updates an existing test suite (partial updates are supported, i.e. you can submit and update specific fields only).

| Field      | Type       | Description
|------------|------------|----------
| appName    | credentials| Your app name. Example - rapidtest
| username   | credentials| Your username.
| apiKey     | credentials| Your API Key.Also you can use account password.
| suiteId    | String     | The ID of the test suite.
| description| String     | The description of the test suite.
| name       | String     | The name of the test suite.

## TestRail.deleteTestSuit
Deletes an existing test suite.Please note: Deleting a test suite cannot be undone and also deletes all active test runs & results, i.e. test runs & results that weren't closed (archived) yet.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| suiteId | String     | The ID of the test suite.

## TestRail.getTemplates
Returns a list of available templates (requires TestRail 5.2 or later).

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| projectId| String     | The ID of the project.

## TestRail.getTest
Returns an existing test.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| testId  | String     | The ID of the test.

## TestRail.getTests
Returns a list of tests for a test run.

| Field    | Type       | Description
|----------|------------|----------
| appName  | credentials| Your app name. Example - rapidtest
| username | credentials| Your username.
| apiKey   | credentials| Your API Key.Also you can use account password.
| runId    | String     | The ID of the test run.
| statusIds| List       | List of status IDs to filter by.

## TestRail.getUser
Returns an existing user.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| userId  | String     | The ID of the user.

## TestRail.getUserByEmail
Returns an existing user by his/her email address. 

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.
| email   | String     | The email address to get the user for.

## TestRail.getUsers
Returns a list of users.

| Field   | Type       | Description
|---------|------------|----------
| appName | credentials| Your app name. Example - rapidtest
| username| credentials| Your username.
| apiKey  | credentials| Your API Key.Also you can use account password.

## TestRail.updateConfigGroup
Updates an existing configuration group (requires TestRail 5.2 or later).

| Field        | Type       | Description
|--------------|------------|----------
| appName      | credentials| Your app name. Example - rapidtest
| username     | credentials| Your username.
| apiKey       | credentials| Your API Key.Also you can use account password.
| configGroupId    | Number     | The ID of the configuration group.
| name      | String     | The name of the configuration group (required).

## TestRail.getRuns
Returns a list of test runs for a project. Only returns those test runs that are not part of a test plan (please see get_plans/get_plan for this).

| Field        | Type       | Description
|--------------|------------|----------
| appName      | credentials| Your app name. Example - rapidtest
| username     | credentials| Your username.
| apiKey       | credentials| Your API Key.Also you can use account password.
| projectId    | Number     | The ID of the project.
| createdAfter | DatePicker | Only return test runs created after this date.
| createdBefore| DatePicker | Only return test runs created before this date.
| createdBy    | List       | List of creators (user IDs) to filter by.
| milestoneId  | List       | List of milestone IDs to filter by (not available if the milestone field is disabled for the project).
| isCompleted    | Boolean       | 1 to return completed test runs only. 0 to return active test runs only.