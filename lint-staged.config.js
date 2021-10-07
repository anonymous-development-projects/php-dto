module.exports = {
	'**/*.php': [
		'./vendor/bin/phpcs --runtime-set ignore_warnings_on_exit 1 --standard=phpcs_ruleset.xml',
		(files) => {
			return `./vendor/bin/phpmd "${files.join(',')}" text phpmd_ruleset.xml`;
		},
	],
	'**/*.md': [
		'npx markdownlint-cli',
	],
};
