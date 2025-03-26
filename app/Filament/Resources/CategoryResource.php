<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
// use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
// use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;


class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'danh muc';




    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Product')
            ->schema([
                TextInput::make('title')->label('Title')->columnSpanFull()->required(),
                RichEditor::make('description')->label('Description')->required(),
                FileUpload::make('thumbnail')->label('Thumbnail')->required(),
                Toggle::make('status')->label('Status')->default(1)->required(),
            ])->columnSpan(6),
            // Fieldset::make('Category')
            // ->schema([
            //     FileUpload::make('thumbnail')->label('Thumbnail'),
            //     TextInput::make('title')->label('Title')->columnSpanFull(),
            //     RichEditor::make('description')->label('Description'),
            // ])->columnSpan(6),
            
        ])->columns(12)
               
                //
           ;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable()
                ->label('ten danh muc')
                ,
                ImageColumn::make('thumbnail'),
                ToggleColumn::make('status'),
                TextColumn::make('description')
                ->searchable()
                ->html()
                //
            ])
            ->filters([
                SelectFilter::make('status')
                ->options([
                    '0' => 'an',
                    '1' => 'hien',
                ])
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
