import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';
import advancedVariables from 'postcss-advanced-variables';
import nested from 'postcss-nested';
import sortMediaQueries from 'postcss-sort-media-queries';

export default cfg => {

	const
		dev  = cfg.env          === 'dev',
		scss = cfg.file.extname === '.scss';

	return {
		map:     dev  ? { inline: false } : false,
		parser:  scss ? 'postcss-scss'    : false,
		plugins: [
			advancedVariables(),
			nested(),
			sortMediaQueries(),
			autoprefixer(),
			dev ? null : cssnano()
		]
	};
};
