# php-pipeline
Repository to provide a simple implementation of the pipeline pattern in PHP.

To use implement the `Pipeline` trait.
Call `->pipe()` from your class passing a list of objects that implement the `ProvidesPipeline` class.
Optionally use `InitializePipeline` helper class to get your values into the pipeline.

See the `Example` folder inside the `tests` folder for a working example.

    return $this->pipe(
            new InitializePipeline($value),
            new DivideByTwo,
            new DivideByTwo,
            new TimesByOneThousand,
            new TimesByOneThousand
    );

## Composer
To install this package into your composer projects run:

`composer require pangolinkeys/pipe`

## Context Pipeline
You can optionally implement `ProvidesContextPipeline` to be passed an instance of the piping object within the pipeline. This will be given as a second parameter to the `handle` method.

## Pipe by class name
As of v2 you can define a pipeline by reference to the class name and allow the pipeline to handle class instantiation.

    return $this->pipe(
        new InitializePipeline($value),
        DivideByTwo::class,
        TimesByOneThousand::class
    );
