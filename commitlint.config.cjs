/**
 * Custom config for commitlint based on Linchpin needs/conventions.
 *
 * This config only slightly modifies the default config to allow for "improve" as a type
 * and to also support JIRA issue IDs. It is important to configure issue KEY prefix below.
 */

/**
 * Define the allowed JIRA issue prefixes for this project
 *
 * @type {string[]}
 */
const JIRA_KEYS = ['BOS', 'NO-JIRA'];

module.exports = {
	plugins: ['commitlint-plugin-jira-rules'],
	extends: ['jira'],
}

const { rules: jiraRules }   = require( 'commitlint-plugin-jira-rules' );
const { rules: configRules } = require( 'commitlint-config-jira' );

// Get list of jiraRules rules.
const jiraMessageRules = Object.keys( jiraRules );

module.exports = {
	extends: ['@commitlint/config-conventional'],
	plugins: [
		{
			rules: {
				...jiraMessageRules.reduce( ( acc,ruleKey ) => {
					acc[ruleKey] = (input, when, options) => {
						// remove conventional commit context from message
						const jiraMessage = `${input.scope}: ${input.subject}`;
						return jiraRules[ ruleKey ]({ raw: jiraMessage }, when, options );
					};
					return acc;
				}, {} )
			}
		}
	],
	rules: {
		...configRules,
		// Linchpin project custom rules
		// Allow for 'improve' (similar to refactor)
		// Allow for JIRA Issue Key to be in the subject line (within the scope).
		'type-enum': [ 2, 'always', [ 'ci', 'chore', 'improve', 'feat', 'fix', 'docs', 'style', 'refactor', 'test', 'revert' ] ],
		'subject-case': [2, 'always', ['sentence-case', 'start-case', 'lower-case']],
		'jira-task-id-min-length': [2, 'never', 0],
		'jira-task-id-project-key': [2, 'always', JIRA_KEYS ]
	}
};