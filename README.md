# pipeline
Repository to provide a simple implementation of the pipeline pattern.

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
