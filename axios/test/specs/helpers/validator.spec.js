'use strict';

var validator = require('../../../lib/helpers/validator');

describe('validator::isOlderVersion', function () {
  it('should return true if dest version is older than the package version', function () {
    expect(validator.isOlderVersion('0.0.1', '1.0.0')).toEqual(true);
    expect(validator.isOlderVersion('0.0.1', '0.1.0')).toEqual(true);
    expect(validator.isOlderVersion('0.0.1', '0.0.1')).toEqual(false);


    expect(validator.isOlderVersion('100.0.0', '1.0.0')).toEqual(false);
    expect(validator.isOlderVersion('100.0.0', '0.1.0')).toEqual(false);
    expect(validator.isOlderVersion('100.0.0', '0.0.1')).toEqual(false);

    expect(validator.isOlderVersion('0.10000.0', '1000.0.1')).toEqual(true);
  });
});

describe('validator::assertOptions', function () {
  it('should throw only if unknown an option was passed', function () {
    expect(function() {
      validator.assertOptions({
        x: true
      }, {
        y: validator.validators.boolean
      });
    }).toThrow(new Error('Unknown option x'));

    expect(function() {
      validator.assertOptions({
        x: true
      }, {
        x: validator.validators.boolean,
        y: validator.validators.boolean
      });
    }).not.toThrow(new Error('Unknown option x'));
  });

  it('should throw TypeError only if option type doesn\'t match', function () {
    expect(function() {
      validator.assertOptions({
        x: 123
      }, {
        x: validator.validators.boolean
      });
    }).toThrow(new TypeError('option x must be a boolean'));

    expect(function() {
      validator.assertOptions({
        x: true
      }, {
        x: validator.validators.boolean,
        y: validator.validators.boolean
      });
    }).not.toThrow();
  });
});
